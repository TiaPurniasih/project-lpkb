<?php

return [
    'form_type' => [
        'formal' => [
            [
                'title' => 'Nava Dhammasekha',
                'code' => 'nava-dhammasekha',
                'description' => 'Pendidikan dasar keagamaan Buddha setingkat sekolah dasar. Persyaratan lengkap mencakup akta notaris, kurikulum, daftar guru, hingga studi kelayakan.',
                'fields' => [
                    [
                        'type' => 'text',
                        'name' => 'pic_name',
                        'label' => 'Nama Penanggung Jawab',
                        'placeholder' => 'Input nama penanggung jawab',
                        'required' => true,
                        'active' => true,
                        'section' => 'identitas-lembaga',
                        'group' => 1,
                    ],
                    [
                        'type' => 'text',
                        'name' => 'organization_name',
                        'label' => 'Nama Badan Penyelenggara',
                        'placeholder' => 'Masukkan nama badan penyelenggara',
                        'required' => true,
                        'active' => true,
                        'section' => 'identitas-lembaga',
                        'group' => 1,
                    ],
                    [
                        'type' => 'text',
                        'name' => 'edu_organization_name',
                        'label' => 'Nama Lembaga Pendidikan',
                        'placeholder' => 'Masukkan nama lembaga pendidikan',
                        'required' => true,
                        'active' => true,
                        'section' => 'identitas-lembaga',
                        'group' => 2,
                    ],
                    [
                        'type' => 'text',
                        'name' => 'edu_organization_phone',
                        'label' => 'Nomor Telepon Lembaga',
                        'placeholder' => 'Masukkan nomor telpon lembaga pendidikan',
                        'required' => true,
                        'active' => true,
                        'section' => 'identitas-lembaga',
                        'group' => 2,
                    ],
                    [
                        'type' => 'text',
                        'name' => 'edu_organization_chief',
                        'label' => 'Nama Kepala Lembaga',
                        'placeholder' => 'Masukkan nama kepala lembaga pendidikan',
                        'required' => true,
                        'active' => true,
                        'section' => 'identitas-lembaga',
                        'group' => 3,
                    ],
                    [
                        'type' => 'date',
                        'name' => 'established_date',
                        'label' => 'Tanggal Berdiri',
                        'placeholder' => 'Pilih tanggal',
                        'required' => true,
                        'active' => true,
                        'section' => 'identitas-lembaga',
                        'group' => 3,
                    ],
                    [
                        'type' => 'date',
                        'name' => 'established_date',
                        'label' => 'Jalur Pendidikan',
                        'placeholder' => 'Pilih tanggal',
                        'required' => true,
                        'active' => true,
                        'section' => 'identitas-lembaga',
                        'group' => 3,
                    ],
                    [
                        'type' => 'file',
                        'name' => 'file_1',
                        'label' => 'Tanda Daftar Yayasan/Perkumpulan dari Kementerian Agama',
                        'placeholder' => 'file (pdf,jpg,png) maks 2 MB',
                        'required' => true,
                        'active' => true,
                        'section' => 'dokumen-penyelenggara',
                        'group' => 1,
                    ],
                ]
            ],
            [
                'title' => 'Mula Dhammasekha',
                'code' => 'mula-dhammasekha',
                'description' => 'Pendidikan keagamaan Buddha setingkat sekolah menengah pertama. Membutuhkan dokumen legalitas badan hukum, kurikulum, sarpras, dan SK pendirian.',
                'fields' => [

                ]
            ],
            [
                'title' => 'Muda Dammasekha',
                'code' => 'muda-dhammasekha',
                'description' => 'Pendidikan keagamaan Buddha setingkat sekolah menengah atas. Persyaratan meliputi akta notaris, kurikulum, SK pengurus, serta daftar pendidik dan tenaga kependidikan.',
                'fields' => [

                ]
            ],
            [
                'title' => 'Uttama Dhammasekha',
                'code' => 'uttama-dhammasekha',
                'description' => 'Pendidikan keagamaan Buddha setingkat perguruan tinggi. Dokumen yang diminta mencakup akta notaris, kurikulum, sarpras, SK kepala, hingga rencana induk pengembangan.',
                'fields' => [

                ]
            ],
        ],
        'nonformal' => [
            [
                'title' => 'Pasastrian',
                'code' => 'pasastrian',
                'description' => 'Pendidikan nonformal berbasis asrama dengan syarat dokumen strategis: rencana pengembangan, kalender pendidikan, data siswa & pendidik, serta surat kesanggupan biaya 3 tahun.',
                'fields' => []
            ],
            [
                'title' => 'Sekolah Minggu Buddha',
                'code' => 'sekolah-minggu-buddha',
                'description' => 'Pendidikan nonformal untuk anak-anak dan remaja. Persyaratan sederhana berupa SK pengurus, rencana program pendidikan, data peserta, data pendidik, serta surat domisili yayasan.',
                'fields' => []
            ],
            [
                'title' => 'Sikkaphana',
                'code' => 'sikkaphana',
                'description' => 'Pendidikan nonformal bagi komunitas dan masyarakat umum. Dokumen wajib meliputi SK pengurus, rencana strategis, kalender kegiatan, data siswa & tenaga pendidik, serta surat pernyataan keabsahan dokumen.',
                'fields' => []
            ],
        ],
    ]
];