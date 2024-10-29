<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use App\Models\Bobot;
use App\Models\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SawController extends Controller
{
    public function index()
    {
        try {
            $alternatives = $this->getAlternatives();
            $kriterias = Kriteria::with('bobot')->get();

            if (empty($alternatives) || $kriterias->isEmpty()) {
                throw new \Exception("Data Alternatif atau Kriteria tidak ditemukan.");
            }

            $normalizedData = $this->normalizeData($alternatives, $kriterias);
            $rankings = $this->calculateRanking($normalizedData, $kriterias);

            return view('saw.index', compact('normalizedData', 'rankings'));

        } catch (\Exception $e) {
            Log::error("Error in SAW Calculation: " . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    private function getAlternatives()
    {
        return [
            [
                'id_konversi' => 'A1',
                'nama_usaha' => 'Kios Lumintu',
                'C1' => 30,
                'C2' => 40,
                'C3' => 30,
            ],
            [
                'id_konversi' => 'A2',
                'nama_usaha' => 'UD. Linggar Jati',
                'C1' => 70,
                'C2' => 40,
                'C3' => 40,
            ],
            [
                'id_konversi' => 'A3',
                'nama_usaha' => 'Nanda Motor',
                'C1' => 30,
                'C2' => 10,
                'C3' => 10,
            ],
            [
                'id_konversi' => 'A4',
                'nama_usaha' => 'Zayaka Tailor',
                'C1' => 30,
                'C2' => 10,
                'C3' => 30,
            ],
        ];
    }

    private function normalizeData($alternatives, $kriterias)
    {
        $normalizedData = [];
        $criteriaValues = [];
        foreach ($kriterias as $kriteria) {
            $kode = $kriteria->bobot->kode;
            if (!isset($criteriaValues[$kode])) {
                $criteriaValues[$kode] = [
                    'max' => ($kriteria->bobot->tipe === 'benefit') ? 0 : INF,
                    'type' => $kriteria->bobot->tipe
                ];
            }
            foreach ($alternatives as $alternative) {
                $value = $alternative[$kode];
                if ($criteriaValues[$kode]['type'] === 'benefit') {
                    $criteriaValues[$kode]['max'] = max($criteriaValues[$kode]['max'], $value);
                } else {
                    $criteriaValues[$kode]['max'] = min($criteriaValues[$kode]['max'], $value);
                }
            }
        }

        foreach ($alternatives as $alternative) {
            $normalizedItem = [
                'id_konversi' => $alternative['id_konversi'],
                'nama_usaha' => $alternative['nama_usaha'],
            ];

            foreach ($kriterias as $kriteria) {
                $kode = $kriteria->bobot->kode;
                $nilai = $alternative[$kode];
                
                if ($criteriaValues[$kode]['type'] === 'benefit') {
                    $normalizedItem[$kode] = $nilai / $criteriaValues[$kode]['max'];
                } else {
                    $normalizedItem[$kode] = $criteriaValues[$kode]['max'] / $nilai;
                }
            }

            $normalizedData[] = $normalizedItem;
        }

        return $normalizedData;
    }

    private function calculateRanking($normalizedData, $kriterias)
    {
        $rankings = [];
        $weights = [];
        foreach ($kriterias as $kriteria) {
            $kode = $kriteria->bobot->kode;
            $weights[$kode] = $kriteria->bobot->nilai_kriteria;
        }

        foreach ($normalizedData as $data) {
            $hasil_nilai = 0;

            foreach ($weights as $kode => $weight) {
                $hasil_nilai += ($data[$kode] ?? 0) * $weight;
            }

            $rankings[] = [
                'id_konversi' => $data['id_konversi'],
                'nama_usaha' => $data['nama_usaha'],
                'hasil_nilai' => $hasil_nilai,
            ];
        }

        usort($rankings, fn($a, $b) => $b['hasil_nilai'] <=> $a['hasil_nilai']);

        return $rankings;
    }
}
