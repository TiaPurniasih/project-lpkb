<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FormConfig;
use Illuminate\Support\Facades\DB;

class FormConfigSeeder extends Seeder
{
    public function run(): void
    {
        DB::transaction(function () {

            // OPTIONAL: bersihkan dulu
            FormConfig::truncate();

            $config = $this->getConfig();

            foreach ($config as $category => $forms) {
                foreach ($forms as $form) {

                    $sort = 1;

                    foreach ($form['fields'] as $field) {
                        FormConfig::create([
                            'category'      => $category,
                            'form_title'    => $form['title'],
                            'form_code'     => $form['code'],
                            'form_codex'    => $form['codex'],
                            'description'   => $form['description'] ?? null,

                            'field_type'    => $field['type'],
                            'field_name'    => $field['name'],
                            'field_label'   => $field['label'],
                            'placeholder'   => $field['placeholder'] ?? null,
                            'options'       => $field['options'] ?? null,

                            'page'          => $field['page'] ?? 1,
                            'section'       => $field['section'] ?? null,
                            'field_group'   => $field['group'] ?? null,

                            'required'      => $field['required'] ?? false,
                            'active'        => $field['active'] ?? true,
                            'sort_order'    => $sort++,
                        ]);
                    }
                }
            }
        });
    }

    private function getConfig(): array
    {
        return [
            'formal' => [
                [
                    'title' => 'Nava Dhammasekha',
                    'code' => 'nava-dhammasekha',
                    'codex' => 'FL-NVDMSK',
                    'description' => 'Pendidikan dasar keagamaan Buddha setingkat sekolah dasar.',
                    'fields' => [
                        [
                            'type' => 'text',
                            'name' => 'pic_name',
                            'label' => 'Nama Penanggung Jawab',
                            'placeholder' => 'Input nama penanggung jawab',
                            'required' => true,
                            'active' => true,
                            'page' => 1,
                            'section' => 'identitas-lembaga',
                            'group' => 1,
                        ],
                        [
                            'type' => 'text',
                            'name' => 'institution_name',
                            'label' => 'Nama Lembaga Pendidikan',
                            'placeholder' => 'Masukkan nama lembaga pendidikan',
                            'required' => true,
                            'active' => true,
                            'page' => 1,
                            'section' => 'identitas-lembaga',
                            'group' => 1,
                        ],
                        [
                            'type' => 'text',
                            'name' => 'institution_head_name',
                            'label' => 'Nama Kepala Lembaga',
                            'placeholder' => 'Masukkan nama kepala lembaga pendidikan',
                            'required' => true,
                            'active' => true,
                            'page' => 1,
                            'section' => 'identitas-lembaga',
                            'group' => 1,
                        ],
                        [
                            'type' => 'text',
                            'name' => 'organizing_body_name',
                            'label' => 'Nama Badan Penyelenggara',
                            'placeholder' => 'Masukkan nama badan penyelenggara',
                            'required' => true,
                            'active' => true,
                            'page' => 1,
                            'section' => 'identitas-lembaga',
                            'group' => 2,
                        ],
                        
                        [
                            'type' => 'text',
                            'name' => 'institution_phone',
                            'label' => 'Nomor Telepon Lembaga',
                            'placeholder' => 'Masukkan nomor telpon lembaga pendidikan',
                            'required' => true,
                            'active' => true,
                            'page' => 1,
                            'section' => 'identitas-lembaga',
                            'group' => 2,
                        ],
                        [
                            'type' => 'date',
                            'name' => 'established_date',
                            'label' => 'Tanggal Berdiri',
                            'placeholder' => 'Pilih tanggal',
                            'required' => true,
                            'active' => true,
                            'page' => 1,
                            'section' => 'identitas-lembaga',
                            'group' => 2,
                        ],
                        // dok
                        [
                            'type' => 'file',
                            'name' => 'docs_1',
                            'label' => 'Tanda Daftar Yayasan/Perkumpulan dari Kementerian Agama',
                            'placeholder' => 'file (pdf,jpg,png) maks 2 MB',
                            'required' => true,
                            'active' => true,
                            'page' => 1,
                            'section' => 'dokumen-penyelenggara',
                        ],
                        [
                            'type' => 'file',
                            'name' => 'docs_2',
                            'label' => 'AD/ART ',
                            'placeholder' => 'file (pdf,jpg,png) maks 2 MB',
                            'required' => true,
                            'active' => true,
                            'page' => 1,
                            'section' => 'dokumen-penyelenggara',
                        ],
                        [
                            'type' => 'custom_address',
                            'name' => 'province',
                            'label' => 'Provinsi',
                            'placeholder' => 'Pilih Provinsi',
                            'required' => true,
                            'active' => true,
                            'page' => 1,
                            'section' => 'alamat-lembaga-pendidikan',
                            'group' => 1,
                        ],
                        [
                            'type' => 'custom_address',
                            'name' => 'city',
                            'label' => 'Kabupaten',
                            'placeholder' => 'Pilih Kabupaten',
                            'required' => true,
                            'active' => true,
                            'page' => 1,
                            'section' => 'alamat-lembaga-pendidikan',
                            'group' => 2,
                        ],
                        [
                            'type' => 'custom_address',
                            'name' => 'district',
                            'label' => 'Kecamatan',
                            'placeholder' => 'Pilih Kabupaten',
                            'required' => true,
                            'active' => true,
                            'page' => 1,
                            'section' => 'alamat-lembaga-pendidikan',
                            'group' => 1,
                        ],
                        [
                            'type' => 'custom_address',
                            'name' => 'subdistrict',
                            'label' => 'Kelurahan',
                            'placeholder' => 'Pilih Kecamatan',
                            'required' => true,
                            'active' => true,
                            'page' => 1,
                            'section' => 'alamat-lembaga-pendidikan',
                            'group' => 2,
                        ],
                        [
                            'type' => 'textarea',
                            'name' => 'address',
                            'label' => 'Alamat Lengkap',
                            'placeholder' => 'Masukkan alamat lembaga',
                            'required' => true,
                            'active' => true,
                            'page' => 1,
                            'section' => 'alamat-lembaga-pendidikan',
                            'group' => 1
                        ],
                        [
                            'type' => 'file',
                            'name' => 'photo_1',
                            'label' => 'Foto Sarpras',
                            'placeholder' => 'file (pdf,jpg,png) maks 2 MB',
                            'required' => true,
                            'active' => true,
                            'page' => 1,
                            'section' => 'sarana-&-Foto',
                        ],
                        [
                            'type' => 'file',
                            'name' => 'photo_2',
                            'label' => 'Foto Gedung Depan',
                            'placeholder' => 'file (pdf,jpg,png) maks 2 MB',
                            'required' => true,
                            'active' => true,
                            'page' => 1,
                            'section' => 'sarana-&-Foto',
                        ],
                        [
                            'type' => 'file',
                            'name' => 'photo_3',
                            'label' => 'Foto Gedung Samping',
                            'placeholder' => 'file (pdf,jpg,png) maks 2 MB',
                            'required' => true,
                            'active' => true,
                            'page' => 1,
                            'section' => 'sarana-&-Foto',
                        ],
                        [
                            'type' => 'file',
                            'name' => 'photo_4',
                            'label' => 'Tambahan Foto Sarpras',
                            'placeholder' => 'file (pdf,jpg,png) maks 2 MB',
                            'required' => true,
                            'active' => true,
                            'page' => 1,
                            'section' => 'sarana-&-Foto',
                        ],

                        // Rekening
                        [
                            'type' => 'select',
                            'name' => 'bank_name',
                            'label' => 'Pilih Bank',
                            'placeholder' => 'Pilih Bank',
                            'required' => true,
                            'active' => true,
                            'page' => 1,
                            'section' => 'rekening',
                            'group' => 1,
                            'options' => [
                                'BCA|Bank Central Asia (BCA)',
                                'BRI|Bank Rakyat Indonesia (BRI',
                                'BNI|Bank Negara Indonesia (BNI)',
                                'BTN|Bank Tabungan Negara (BTN)',
                            ]
                        ],
                        [
                            'type' => 'text',
                            'name' => 'bank_account',
                            'label' => 'Nomor Rekening',
                            'placeholder' => 'Nomor Rekening',
                            'required' => true,
                            'active' => true,
                            'page' => 1,
                            'section' => 'rekening',
                            'group' => 1,
                        ],
                        [
                            'type' => 'text',
                            'name' => 'bank_office',
                            'label' => 'Cabang Bank',
                            'placeholder' => 'Cabang Bank',
                            'required' => true,
                            'active' => true,
                            'page' => 1,
                            'section' => 'rekening',
                            'group' => 1,
                        ],
                        [
                            'type' => 'file',
                            'name' => 'docs_3',
                            'label' => 'Upload Foto Rekening',
                            'placeholder' => 'file (pdf,jpg,png) maks 2 MB',
                            'required' => true,
                            'active' => true,
                            'page' => 1,
                            'section' => 'rekening',
                        ],
                        // PAGE 2
                        [
                            'type' => 'file',
                            'name' => 'docs_4',
                            'label' => 'SK Pengurus Organisasi (struktur & susunan + KTP)',
                            'placeholder' => 'file (pdf,jpg,png) maks 2 MB',
                            'required' => true,
                            'active' => true,
                            'page' => 2,
                            'section' => 'dokumen',
                        ],
                        [
                            'type' => 'file',
                            'name' => 'docs_5',
                            'label' => 'SK Struktur Manajemen & Personalia Penyelenggara Pendidikan',
                            'placeholder' => 'file (pdf,jpg,png) maks 2 MB',
                            'required' => true,
                            'active' => true,
                            'page' => 2,
                            'section' => 'dokumen',
                        ],
                        [
                            'type' => 'file',
                            'name' => 'docs_6',
                            'label' => 'Surat Pernyataan Kesanggupan Pembiayaan min. 1 tahun (bermaterai) ',
                            'placeholder' => 'file (pdf,jpg,png) maks 2 MB',
                            'required' => true,
                            'active' => true,
                            'page' => 2,
                            'section' => 'dokumen',
                        ],
                        [
                            'type' => 'file',
                            'name' => 'docs_7',
                            'label' => 'Dokumen Kurikulum',
                            'placeholder' => 'file (pdf,jpg,png) maks 2 MB',
                            'required' => true,
                            'active' => true,
                            'page' => 2,
                            'section' => 'dokumen',
                        ],
                        [
                            'type' => 'file',
                            'name' => 'docs_8',
                            'label' => 'Dokumen Rencana Induk Pengembangan (RIP) ',
                            'placeholder' => 'file (pdf,jpg,png) maks 2 MB',
                            'required' => true,
                            'active' => true,
                            'page' => 2,
                            'section' => 'dokumen',
                        ],
                        [
                            'type' => 'file',
                            'name' => 'docs_9',
                            'label' => 'Daftar Calon Guru + CV + Ijazah terakhir',
                            'placeholder' => 'file (pdf,jpg,png) maks 2 MB',
                            'required' => true,
                            'active' => true,
                            'page' => 2,
                            'section' => 'dokumen',
                        ],
                        [
                            'type' => 'file',
                            'name' => 'docs_10',
                            'label' => 'SK Pengangkatan Kepala Sekolah + CV + Ijazah terakhir',
                            'placeholder' => 'file (pdf,jpg,png) maks 2 MB',
                            'required' => true,
                            'active' => true,
                            'page' => 2,
                            'section' => 'dokumen',
                        ],
                        [
                            'type' => 'file',
                            'name' => 'docs_11',
                            'label' => 'Daftar Calon Tenaga Kependidikan + CV + Ijazah terakhir',
                            'placeholder' => 'file (pdf,jpg,png) maks 2 MB',
                            'required' => true,
                            'active' => true,
                            'page' => 2,
                            'section' => 'dokumen',
                        ],
                        [
                            'type' => 'file',
                            'name' => 'docs_12',
                            'label' => 'Daftar Sarana & Prasarana (detail list)',
                            'placeholder' => 'file (pdf,jpg,png) maks 2 MB',
                            'required' => true,
                            'active' => true,
                            'page' => 2,
                            'section' => 'dokumen',
                        ],
                        [
                            'type' => 'file',
                            'name' => 'photo_5',
                            'label' => 'Foto Sarana & Prasarana (ruang kelas, fasilitas, dll)',
                            'placeholder' => 'file (pdf,jpg,png) maks 2 MB',
                            'required' => true,
                            'active' => true,
                            'page' => 2,
                            'section' => 'dokumen',
                        ],
                        [
                            'type' => 'file',
                            'name' => 'photo_6',
                            'label' => 'Sertifikat / surat keterangan kepemilikan/hibah tanah/lahan',
                            'placeholder' => 'file (pdf,jpg,png) maks 2 MB',
                            'required' => true,
                            'active' => true,
                            'page' => 2,
                            'section' => 'dokumen',
                        ],
                        [
                            'type' => 'file',
                            'name' => 'photo_7',
                            'label' => 'Dokumen Studi Kelayakan',
                            'placeholder' => 'file (pdf,jpg,png) maks 2 MB',
                            'required' => true,
                            'active' => true,
                            'page' => 2,
                            'section' => 'dokumen',
                        ],
                    ]
                ],
            ],
        ];
    }
}
