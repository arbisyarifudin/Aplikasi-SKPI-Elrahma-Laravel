<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        @page {
            /* margin: 0cm 0cm; */
            /* margin: 1.75cm 1.47cm 2.39cm 1.42cm; */
            /* margin-top: 1.75cm;
            margin-bottom: 2.39cm;
            margin-left: 1.47cm;
            margin-right: 1.42cm; */

            margin: 0.75cm 0.75cm 0.75cm 0.75cm;
        }

        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 12pt;
            border: 10pt solid black;
            margin: 0cm 0cm;
            padding-top: 0.5cm;
        }
        .wrapper {
            width: 100%;
            max-width: 100%;
            margin: 0 auto;
        }

    </style>
</head>

<body>

    <div class="wrapper">
        <p style="margin-top: 0pt; margin-bottom:10pt">
            <span style="height:0pt; display:block; position:absolute; z-index:0">
                <img src="{{ $pengaturan['logo_institusi'] }}" width="84" height="85" alt=""
                    style="margin-top:-7.7pt; margin-left:233.45pt; position:absolute;"></span><span
                style="font-family:'Times New Roman'">&#xa0;</span>
        </p>
        <table cellspacing="0" cellpadding="0" style="width:516.25pt; margin-left:14.4pt; border-collapse:collapse">
            <tr style="height:15pt">
                <td colspan="17" style="width:505.45pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt">
                        <strong><span style="font-family:'Times New Roman'; ">&#xa0;</span></strong>
                    </p>
                    {{-- <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:12pt">
                        <br><br><strong><span style="font-family:'Times New Roman'; ">SEKOLAH TINGGI MANAJEMEN
                                INFORMATIKA
                                DAN ILMU KOMPUTER</span></strong>
                    </p> --}}
                    {{-- <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:12pt">
                        <strong><span style="font-family:'Times New Roman'; ">EL RAHMA YOGYAKARTA</span></strong>
                    </p> --}}
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:12pt">
                        <br><br><strong><span style="font-family:'Times New Roman'; ">{!! $pengaturan['nama_institusi']
                                !!} </span></strong>
                    </p>
                </td>
            </tr>
            <tr style="height:13.5pt; page-break-inside: avoid;">
                <td style="width:20.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt">
                        <strong><span style="font-family:'Times New Roman'; ">&#xa0;</span></strong>
                    </p>
                </td>
                <td colspan="5" style="width:52.35pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
                <td colspan="5" style="width:43.95pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
                <td style="width:24.3pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
                <td colspan="5" style="width:320.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
            </tr>
            <tr style="height:15pt">
                <td colspan="17" style="width:505.45pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:12pt">
                        <strong><span style="font-family:'Times New Roman'; ">Surat Keterangan Pendamping
                                Ijazah</span></strong>
                    </p>
                </td>
            </tr>
            <tr style="height:15pt">
                <td colspan="17" style="width:505.45pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:12pt">
                        <strong><em><span style="font-family:'Times New Roman'; ">Diploma
                                    Supplement</span></em></strong>
                    </p>
                </td>
            </tr>
            {{ $dokumenSkpi }}
            <tr style="height:15pt">
                <td colspan="17" style="width:505.45pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:12pt">
                        <strong><span style="font-family:'Times New Roman'; ">Nomor : {{ $dokumenSkpi->nomor
                                }}</span></strong>
                    </p>
                </td>
            </tr>
            <tr style="height:13.5pt; page-break-inside: avoid;">
                <td style="width:20.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt">
                        <strong><span style="font-family:'Times New Roman'; ">&#xa0;</span></strong>
                    </p>
                </td>
                <td colspan="5" style="width:52.35pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
                <td colspan="5" style="width:43.95pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
                <td style="width:24.3pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
                <td colspan="5" style="width:320.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
            </tr>
            <tr style="height:30pt">
                <td colspan="17" style="width:505.45pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:middle">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:12pt">
                        <span style="font-family:'Times New Roman'">Surat Keterangan Pendamping Ijazah sebagai pelengkap
                            Ijazah yang menerangkan capaian pembelajaran dan prestasi dari pemegang Ijazah selama masa
                            studi</span>
                    </p>
                </td>
            </tr>
            <tr style="height:28.5pt">
                <td colspan="17" style="width:505.45pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:12pt">
                        <em><span style="font-family:'Times New Roman'; ">The Diploma Supplement accompanies a higher
                                education certificate providing a standardized description of the nature, level, content
                                and
                                status of the studies completed by its holder</span></em>
                    </p>
                </td>
            </tr>
            <tr style="height:13.5pt; page-break-inside: avoid;">
                <td style="width:20.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt">
                        <em><span style="font-family:'Times New Roman'; ">&#xa0;</span></em>
                    </p>
                </td>
                <td colspan="5" style="width:52.35pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
                <td colspan="5" style="width:43.95pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
                <td style="width:24.3pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
                <td colspan="5" style="width:320.85pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
            </tr>
            <tr style="height:13.5pt; page-break-inside: avoid;">
                <td rowspan="2"
                    style="width:20.8pt; border-top-style:solid; border-top-width:0.75pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.4pt; padding-left:5.03pt; vertical-align:middle; background-color:#92d050">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt">
                        <strong><span style="font-family:'Times New Roman'; ">I.</span></strong>
                    </p>
                </td>
                <td colspan="16"
                    style="width:473.85pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom; background-color:#92d050">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <strong><span style="font-family:'Times New Roman'; ">INFORMASI TENTANG IDENTITAS DIRI PEMEGANG
                                SKPI</span></strong>
                    </p>
                </td>
            </tr>
            <tr style="height:13.5pt; page-break-inside: avoid;">
                <td colspan="16"
                    style="width:473.85pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom; background-color:#92d050">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <strong><em><span style="font-family:'Times New Roman'; ">INFORMATION OF PERSONAL INFORMATION
                                    DIPLOMA SUPPLEMENT HOLDER</span></em></strong>
                    </p>
                </td>
            </tr>
            <tr style="height:13.5pt; page-break-inside: avoid;">
                <td style="width:20.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt">
                        <strong><em><span style="font-family:'Times New Roman'; ">&#xa0;</span></em></strong>
                    </p>
                </td>
                <td colspan="5" style="width:52.35pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
                <td colspan="5" style="width:43.95pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
                <td colspan="2" style="width:42.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
                <td colspan="4" style="width:302.95pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
            </tr>
            <tr style="height:13.5pt; page-break-inside: avoid;">
                <td rowspan="2"
                    style="width:20.8pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt">
                        <span style="font-family:'Times New Roman'">1.1</span>
                    </p>
                </td>
                <td colspan="12"
                    style="width:160.1pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <span style="font-family:'Times New Roman'">Nama Lengkap</span>
                    </p>
                </td>
                <td colspan="4"
                    style="width:302.95pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <span style="font-family:'Times New Roman'">: {{ $mahasiswa->nama }}</span>
                    </p>
                </td>
            </tr>
            <tr style="height:13.5pt; page-break-inside: avoid;">
                {{-- <td></td> --}}
                <td colspan="12"
                    style="width:160.1pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <em><span style="font-family:'Times New Roman'; ">Name</span></em>
                    </p>
                </td>
                <td colspan="4"
                    style="width:302.95pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
            </tr>
            <tr style="height:13.5pt; page-break-inside: avoid;">
                <td rowspan="2"
                    style="width:20.8pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt">
                        <span style="font-family:'Times New Roman'">1.2</span>
                    </p>
                </td>
                <td colspan="12"
                    style="width:160.1pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <span style="font-family:'Times New Roman'">Tempat dan Tanggal Lahir</span>
                    </p>
                </td>
                <td colspan="4"
                    style="width:302.95pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <span style="font-family:'Times New Roman'">: {{ $mahasiswa->tempat_lahir }},
                            {{ $mahasiswa->tanggal_lahir }}</span>
                    </p>
                </td>
            </tr>
            <tr style="height:13.5pt; page-break-inside: avoid;">
                {{-- <td></td> --}}
                <td colspan="12"
                    style="width:160.1pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <em><span style="font-family:'Times New Roman'; ">Place and Date of Birth</span></em>
                    </p>
                </td>
                <td colspan="4"
                    style="width:302.95pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span><span
                            style="font-family:'Times New Roman'">&#xa0;</span><em><span
                                style="font-family:'Times New Roman'; ">{{ $mahasiswa->tempat_lahir }},
                                {{ $mahasiswa->tanggal_lahir_en }}</span></em>
                    </p>
                </td>
            </tr>
            <tr style="height:13.5pt; page-break-inside: avoid;">
                <td rowspan="2"
                    style="width:20.8pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt">
                        <span style="font-family:'Times New Roman'">1.3</span>
                    </p>
                </td>
                <td colspan="12"
                    style="width:160.1pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <span style="font-family:'Times New Roman'">Nomor Induk Mahasiswa</span>
                    </p>
                </td>
                <td colspan="4"
                    style="width:302.95pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <span style="font-family:'Times New Roman'">: {{ $mahasiswa->nim }} </span>
                    </p>
                </td>
            </tr>
            <tr style="height:13.5pt; page-break-inside: avoid;">
                {{-- <td></td> --}}
                <td colspan="12"
                    style="width:160.1pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <em><span style="font-family:'Times New Roman'; ">Student Identification Number</span></em>
                    </p>
                </td>
                <td colspan="4"
                    style="width:302.95pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
            </tr>
            <tr style="height:13.5pt; page-break-inside: avoid;">
                <td rowspan="2"
                    style="width:20.8pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt">
                        <span style="font-family:'Times New Roman'">1.4</span>
                    </p>
                </td>
                <td colspan="12"
                    style="width:160.1pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; border-left-style:solid; border-left-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <span style="font-family:'Times New Roman'">Nomor Induk Kependudukan</span>
                    </p>
                </td>
                <td colspan="4"
                    style="width:302.95pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; border-left-style:solid; border-left-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <span style="font-family:'Times New Roman'">: {{ $mahasiswa->nik }}</span>
                    </p>
                </td>
            </tr>
            <tr style="height:13.5pt; page-break-inside: avoid;">
                {{-- <td></td> --}}
                <td colspan="12"
                    style="width:160.1pt; border-right-style:solid; border-right-width:0.75pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <em><span style="font-family:'Times New Roman'; ">Id Number</span></em>
                    </p>
                </td>
                <td colspan="4"
                    style="width:302.95pt; border-right-style:solid; border-right-width:0.75pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
            </tr>
            <tr style="height:13.5pt; page-break-inside: avoid;">
                <td rowspan="2"
                    style="width:20.8pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt">
                        <span style="font-family:'Times New Roman'">1.5</span>
                    </p>
                </td>
                <td colspan="12"
                    style="width:160.1pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <span style="font-family:'Times New Roman'">Tahun Masuk</span>
                    </p>
                </td>
                <td colspan="4"
                    style="width:302.95pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <span style="font-family:'Times New Roman'">: {{ $mahasiswaProdi->tahun_masuk }}</span>
                    </p>
                </td>
            </tr>
            <tr style="height:13.5pt; page-break-inside: avoid;">
                {{-- <td></td> --}}
                <td colspan="12"
                    style="width:160.1pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <em><span style="font-family:'Times New Roman'; ">Admission Year</span></em>
                    </p>
                </td>
                <td colspan="4"
                    style="width:302.95pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
            </tr>
            <tr style="height:13.5pt; page-break-inside: avoid;">
                <td rowspan="2"
                    style="width:20.8pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt">
                        <span style="font-family:'Times New Roman'">1.6</span>
                    </p>
                </td>
                <td colspan="12"
                    style="width:160.1pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <span style="font-family:'Times New Roman'">Tahun Lulus</span>
                    </p>
                </td>
                <td colspan="4"
                    style="width:302.95pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <span style="font-family:'Times New Roman'">: {{ $mahasiswaProdi->tahun_lulus }}</span>
                    </p>
                </td>
            </tr>
            <tr style="height:13.5pt; page-break-inside: avoid;">
                {{-- <td></td> --}}
                <td colspan="12"
                    style="width:160.1pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <em><span style="font-family:'Times New Roman'; ">Graduation Year</span></em>
                    </p>
                </td>
                <td colspan="4"
                    style="width:302.95pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
            </tr>
            <tr style="height:13.5pt; page-break-inside: avoid;">
                <td rowspan="2"
                    style="width:20.8pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt">
                        <span style="font-family:'Times New Roman'">1.7</span>
                    </p>
                </td>
                <td colspan="12"
                    style="width:160.1pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <span style="font-family:'Times New Roman'">Nomor Ijazah</span>
                    </p>
                </td>
                <td colspan="4"
                    style="width:302.95pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <span style="font-family:'Times New Roman'">: {{ $mahasiswaProdi->nomor_ijazah }}</span>
                    </p>
                </td>
            </tr>
            <tr style="height:13.5pt; page-break-inside: avoid;">
                {{-- <td></td> --}}
                <td colspan="12"
                    style="width:160.1pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <em><span style="font-family:'Times New Roman'; ">Number of Certification</span></em>
                    </p>
                </td>
                <td colspan="4"
                    style="width:302.95pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
            </tr>
            <tr style="height:13.5pt; page-break-inside: avoid;">
                <td rowspan="2"
                    style="width:20.8pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt">
                        <span style="font-family:'Times New Roman'">1.8</span>
                    </p>
                </td>
                <td colspan="12"
                    style="width:160.1pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <span style="font-family:'Times New Roman'">Gelar</span>
                    </p>
                </td>
                <td colspan="4"
                    style="width:302.95pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span><span
                            style="font-family:'Times New Roman'">: {{ $programStudi->gelar }}</span>
                    </p>
                </td>
            </tr>
            <tr style="height:13.5pt; page-break-inside: avoid;">
                {{-- <td></td> --}}
                <td colspan="12"
                    style="width:160.1pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <em><span style="font-family:'Times New Roman'; ">Title</span></em>
                    </p>
                </td>
                <td colspan="4"
                    style="width:302.95pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <em><span style="font-family:'Times New Roman'; ">&#xa0;</span></em><em><span
                                style="font-family:'Times New Roman'; ">&#xa0; </span></em><em><span
                                style="font-family:'Times New Roman'; ">{{ $programStudi->gelar_en }}</span></em>
                    </p>
                </td>
            </tr>
            <tr style="height:13.5pt; page-break-inside: avoid;">
                <td style="width:20.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:middle">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
                <td colspan="5" style="width:52.35pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
                <td colspan="5" style="width:43.95pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
                <td colspan="2" style="width:42.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
                <td colspan="4" style="width:302.95pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
            </tr>
            <tr style="height:13.5pt; page-break-inside: avoid;">
                <td rowspan="2"
                    style="width:20.8pt; border-top-style:solid; border-top-width:0.75pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.4pt; padding-left:5.03pt; vertical-align:middle; background-color:#92d050">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt">
                        <strong><span style="font-family:'Times New Roman'; ">II.</span></strong>
                    </p>
                </td>
                <td colspan="16"
                    style="width:473.85pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom; background-color:#92d050">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <strong><span style="font-family:'Times New Roman'; ">INFORMASI TENTANG IDENTITAS PENYELENGGARA
                                PROGRAM</span></strong>
                    </p>
                </td>
            </tr>
            <tr style="height:13.5pt; page-break-inside: avoid;">
                <td colspan="16"
                    style="width:473.85pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom; background-color:#92d050">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <strong><em><span style="font-family:'Times New Roman'; ">INFORMATION OF IDENTITY HIGHER
                                    EDUCATION
                                    INSTITUTION</span></em></strong>
                    </p>
                </td>
            </tr>
            <tr style="height:13.5pt; page-break-inside: avoid;">
                <td style="width:20.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:middle">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt">
                        <strong><em><span style="font-family:'Times New Roman'; ">&#xa0;</span></em></strong>
                    </p>
                </td>
                <td colspan="5" style="width:52.35pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
                <td colspan="5" style="width:43.95pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
                <td colspan="2" style="width:42.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
                <td colspan="4" style="width:302.95pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
            </tr>
            <tr style="height:13.5pt; page-break-inside: avoid;">
                <td rowspan="2"
                    style="width:20.8pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt">
                        <span style="font-family:'Times New Roman'">2.1</span>
                    </p>
                </td>
                <td colspan="12"
                    style="width:160.1pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <span style="font-family:'Times New Roman'">SK Pendirian Perguruan Tinggi</span>
                    </p>
                </td>
                <td colspan="4"
                    style="width:302.95pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <span style="font-family:'Times New Roman'">SK Mendiknas No. 155/D/O/2001, Tanggal 30 Agustus
                            2001</span>
                    </p>
                </td>
            </tr>
            <tr style="height:13.5pt; page-break-inside: avoid;">
                {{-- <td></td> --}}
                <td colspan="12"
                    style="width:160.1pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <em><span style="font-family:'Times New Roman'; ">Certificate of Establishment</span></em>
                    </p>
                </td>
                <td colspan="4"
                    style="width:302.95pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <em><span style="font-family:'Times New Roman'; ">SK Mendiknas No. 155/D/O/2001, Date August 30,
                                2001</span></em>
                    </p>
                </td>
            </tr>
            <tr style="height:13.5pt; page-break-inside: avoid;">
                <td rowspan="2"
                    style="width:20.8pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt">
                        <span style="font-family:'Times New Roman'">2.2</span>
                    </p>
                </td>
                <td colspan="12"
                    style="width:160.1pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <span style="font-family:'Times New Roman'">Nama Perguruan Tinggi</span>
                    </p>
                </td>
                <td colspan="4"
                    style="width:302.95pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <span style="font-family:'Times New Roman'">{!! strip_tags($pengaturan['nama_institusi']) !!}
                        </span>
                    </p>
                </td>
            </tr>
            <tr style="height:13.5pt; page-break-inside: avoid;">
                {{-- <td></td> --}}
                <td colspan="12"
                    style="width:160.1pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <em><span style="font-family:'Times New Roman'; ">Name of University</span></em>
                    </p>
                </td>
                <td colspan="4"
                    style="width:302.95pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <em><span style="font-family:'Times New Roman'; ">{{ $pengaturan['nama_institusi_en']
                                }}</span></em>
                    </p>
                </td>
            </tr>
            <tr style="height:13.5pt; page-break-inside: avoid;">
                <td rowspan="2"
                    style="width:20.8pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt">
                        <span style="font-family:'Times New Roman'">2.3</span>
                    </p>
                </td>
                <td colspan="12"
                    style="width:160.1pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <span style="font-family:'Times New Roman'">Nama Program Studi</span>
                    </p>
                </td>
                <td colspan="4"
                    style="width:302.95pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <span style="font-family:'Times New Roman'">{{ $programStudi->nama }}</span>
                    </p>
                </td>
            </tr>
            <tr style="height:13.5pt; page-break-inside: avoid;">
                {{-- <td></td> --}}
                <td colspan="12"
                    style="width:160.1pt; border-right-style:solid; border-right-width:0.75pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <em><span style="font-family:'Times New Roman'; ">Study Program</span></em>
                    </p>
                </td>
                <td colspan="4"
                    style="width:302.95pt; border-right-style:solid; border-right-width:0.75pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <em><span style="font-family:'Times New Roman'; ">{{ $programStudi->nama_en }}</span></em>
                    </p>
                </td>
            </tr>
            <tr style="height:13.5pt; page-break-inside: avoid;">
                <td rowspan="2"
                    style="width:20.8pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt">
                        <span style="font-family:'Times New Roman'">2.4</span>
                    </p>
                </td>
                <td colspan="12"
                    style="width:160.1pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <span style="font-family:'Times New Roman'">Jenis Pendidikan</span>
                    </p>
                </td>
                <td colspan="4"
                    style="width:302.95pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <span style="font-family:'Times New Roman'">{{ $pengaturan['jenis_pendidikan'] }}</span>
                    </p>
                </td>
            </tr>
            <tr style="height:13.5pt; page-break-inside: avoid;">
                {{-- <td></td> --}}
                <td colspan="12"
                    style="width:160.1pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <em><span style="font-family:'Times New Roman'; ">Classification Study</span></em>
                    </p>
                </td>
                <td colspan="4"
                    style="width:302.95pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <em><span style="font-family:'Times New Roman'; ">{{ $pengaturan['jenis_pendidikan_en']
                                }}</span></em>
                    </p>
                </td>
            </tr>
            <tr style="height:13.5pt; page-break-inside: avoid;">
                <td rowspan="2"
                    style="width:20.8pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt">
                        <span style="font-family:'Times New Roman'">2.5</span>
                    </p>
                </td>
                <td colspan="12"
                    style="width:160.1pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <span style="font-family:'Times New Roman'">Jenjang Pendidikan</span>
                    </p>
                </td>
                <td colspan="4"
                    style="width:302.95pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <span style="font-family:'Times New Roman'">{{ $jenjangPendidikan->nama }}</span>
                    </p>
                </td>
            </tr>
            <tr style="height:13.5pt; page-break-inside: avoid;">
                {{-- <td></td> --}}
                <td colspan="12"
                    style="width:160.1pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <em><span style="font-family:'Times New Roman'; ">Level of Education</span></em>
                    </p>
                </td>
                <td colspan="4"
                    style="width:302.95pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <em><span style="font-family:'Times New Roman'; ">{{ $jenjangPendidikan->nama_en }}</span></em>
                    </p>
                </td>
            </tr>
            <tr style="height:13.5pt; page-break-inside: avoid;">
                <td rowspan="2"
                    style="width:20.8pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt">
                        <span style="font-family:'Times New Roman'">2.6</span>
                    </p>
                </td>
                <td colspan="12"
                    style="width:160.1pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <span style="font-family:'Times New Roman'">Jenjang Kualifikasi sesuai KKNI</span>
                    </p>
                </td>
                <td colspan="4"
                    style="width:302.95pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <span style="font-family:'Times New Roman'">{{ $jenjangPendidikan->level_kkni}}</span>
                    </p>
                </td>
            </tr>
            <tr style="height:13.5pt; page-break-inside: avoid;">
                {{-- <td></td> --}}
                <td colspan="12"
                    style="width:160.1pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <em><span style="font-family:'Times New Roman'; ">Appropriate Level of Qualification
                                KKNI</span></em>
                    </p>
                </td>
                <td colspan="4"
                    style="width:302.95pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <em><span style="font-family:'Times New Roman'; ">&#xa0;</span></em>
                    </p>
                </td>
            </tr>
            <tr style="height:13.5pt; page-break-inside: avoid;">
                <td rowspan="2"
                    style="width:20.8pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt">
                        <span style="font-family:'Times New Roman'">2.7</span>
                    </p>
                </td>
                <td colspan="12"
                    style="width:160.1pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <span style="font-family:'Times New Roman'">Persyaratan Penerimaan</span>
                    </p>
                </td>
                <td colspan="4"
                    style="width:302.95pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <span style="font-family:'Times New Roman'">{{ $jenjangPendidikan->syarat_masuk }}</span>
                    </p>
                </td>
            </tr>
            <tr style="height:13.5pt; page-break-inside: avoid;">
                {{-- <td></td> --}}
                <td colspan="12"
                    style="width:160.1pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <em><span style="font-family:'Times New Roman'; ">Access Requirements</span></em>
                    </p>
                </td>
                <td colspan="4"
                    style="width:302.95pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <em><span style="font-family:'Times New Roman'; ">{{ $jenjangPendidikan->syarat_masuk_en
                                }}</span></em>
                    </p>
                </td>
            </tr>
            <tr style="height:13.5pt; page-break-inside: avoid;">
                <td rowspan="2"
                    style="width:20.8pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt">
                        <span style="font-family:'Times New Roman'">2.8</span>
                    </p>
                </td>
                <td colspan="12"
                    style="width:160.1pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <span style="font-family:'Times New Roman'">Bahasa Pengantar Kuliah</span>
                    </p>
                </td>
                <td colspan="4"
                    style="width:302.95pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <span style="font-family:'Times New Roman'">Indonesia</span>
                    </p>
                </td>
            </tr>
            <tr style="height:13.5pt; page-break-inside: avoid;">
                {{-- <td></td> --}}
                <td colspan="12"
                    style="width:160.1pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <em><span style="font-family:'Times New Roman'; ">Language Study</span></em>
                    </p>
                </td>
                <td colspan="4"
                    style="width:302.95pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <em><span style="font-family:'Times New Roman'; ">Indonesia</span></em>
                    </p>
                </td>
            </tr>
            <tr style="height:13.5pt; page-break-inside: avoid;">
                <td rowspan="2"
                    style="width:20.8pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt">
                        <span style="font-family:'Times New Roman'">2.9</span>
                    </p>
                </td>
                <td colspan="12"
                    style="width:160.1pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <span style="font-family:'Times New Roman'">Sistem Penilaian</span>
                    </p>
                </td>
                <td colspan="4"
                    style="width:302.95pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <span style="font-family:'Times New Roman'">Skala 1-4; A=4, B=3, C=2, D=1</span>
                    </p>
                </td>
            </tr>
            <tr style="height:13.5pt; page-break-inside: avoid;">
                {{-- <td></td> --}}
                <td colspan="12"
                    style="width:160.1pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <em><span style="font-family:'Times New Roman'; ">Evaluation System</span></em>
                    </p>
                </td>
                <td colspan="4"
                    style="width:302.95pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <em><span style="font-family:'Times New Roman'; ">Scale 1-4; A=4, B=3, C=2, D=1</span></em>
                    </p>
                </td>
            </tr>
            <tr style="height:13.5pt; page-break-inside: avoid;">
                <td rowspan="2"
                    style="width:20.8pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt">
                        <span style="font-family:'Times New Roman'">2.10</span>
                    </p>
                </td>
                <td colspan="12"
                    style="width:160.1pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <span style="font-family:'Times New Roman'">Lama Studi Reguler</span>
                    </p>
                </td>
                <td colspan="4"
                    style="width:302.95pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <span style="font-family:'Times New Roman'">{{ $jenjangPendidikan->lama_studi_reguler }}</span>
                    </p>
                </td>
            </tr>
            <tr style="height:13.5pt; page-break-inside: avoid;">
                {{-- <td></td> --}}
                <td colspan="12"
                    style="width:160.1pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <em><span style="font-family:'Times New Roman'; ">Regular Study Period</span></em>
                    </p>
                </td>
                <td colspan="4"
                    style="width:302.95pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <em><span style="font-family:'Times New Roman'; ">&#xa0;</span></em>
                    </p>
                </td>
            </tr>
            <tr style="height:13.5pt; page-break-inside: avoid;">
                <td rowspan="2"
                    style="width:20.8pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt">
                        <span style="font-family:'Times New Roman'">2.11</span>
                    </p>
                </td>
                <td colspan="12"
                    style="width:160.1pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <span style="font-family:'Times New Roman'">Jenis dan Jenjang Pendidikan Lanjutan</span>
                    </p>
                </td>
                <td colspan="4"
                    style="width:302.95pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <span style="font-family:'Times New Roman'">{{ $jenjangPendidikan->jenjang_lanjutan }}</span>
                    </p>
                </td>
            </tr>
            <tr style="height:13.5pt; page-break-inside: avoid;">
                {{-- <td></td> --}}
                <td colspan="12"
                    style="width:160.1pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <em><span style="font-family:'Times New Roman'; ">Access to Further Study</span></em>
                    </p>
                </td>
                <td colspan="4"
                    style="width:302.95pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <em><span style="font-family:'Times New Roman'; ">{{ $jenjangPendidikan->jenjang_lanjutan_en
                                }}</span></em>
                    </p>
                </td>
            </tr>
            <tr style="height:13.5pt; page-break-inside: avoid;">
                <td rowspan="2"
                    style="width:20.8pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt">
                        <span style="font-family:'Times New Roman'">2.12</span>
                    </p>
                </td>
                <td colspan="12"
                    style="width:160.1pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <span style="font-family:'Times New Roman'">Status Profesi</span>
                    </p>
                </td>
                <td colspan="4"
                    style="width:302.95pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
            </tr>
            <tr style="height:13.5pt; page-break-inside: avoid;">
                {{-- <td></td> --}}
                <td colspan="12"
                    style="width:160.1pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <em><span style="font-family:'Times New Roman'; ">Professional Status</span></em>
                    </p>
                </td>
                <td colspan="4"
                    style="width:302.95pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
            </tr>
            <tr style="height:13.5pt; page-break-inside: avoid;">
                <td style="width:20.8pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
                <td colspan="5" style="width:52.35pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
                <td colspan="5" style="width:43.95pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
                <td colspan="2" style="width:42.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
                <td colspan="4" style="width:302.95pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
            </tr>
            <tr style="height:13.5pt; page-break-inside: avoid;">
                <td colspan="4" rowspan="2"
                    style="width:41.3pt; border-top-style:solid; border-top-width:0.75pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.4pt; padding-left:5.03pt; vertical-align:middle; background-color:#92d050">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt">
                        <strong><span style="font-family:'Times New Roman'; ">III.</span></strong>
                    </p>
                </td>
                <td colspan="13"
                    style="width:453.35pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom; background-color:#92d050">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <strong><span style="font-family:'Times New Roman'; ">INFORMASI TENTANG KUALIFIKASI DAN HASIL
                                YANG
                                DICAPAI</span></strong>
                    </p>
                </td>
            </tr>
            <tr style="height:13.5pt; page-break-inside: avoid;">
                <td colspan="13"
                    style="width:453.35pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom; background-color:#92d050">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <strong><em><span style="font-family:'Times New Roman'; ">INFORMATION OF QUALIFICATION AND
                                    LEARNING
                                    OUTCOME</span></em></strong>
                    </p>
                </td>
            </tr>
            <tr style="height:13.5pt; page-break-inside: avoid;">
                <td colspan="4" style="width:41.3pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt">
                        <strong><em><span style="font-family:'Times New Roman'; ">&#xa0;</span></em></strong>
                    </p>
                </td>
                <td colspan="3" style="width:36.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
                <td colspan="3" style="width:36.05pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
                <td colspan="6" style="width:78.35pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
                <td style="width:270.15pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
            </tr>
            <tr style="height:13.5pt; page-break-inside: avoid;">
                <td colspan="4"
                    style="width:41.3pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt">
                        <strong><span style="font-family:'Times New Roman'; ">A</span></strong>
                    </p>
                </td>
                <td colspan="12"
                    style="width:172.4pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:middle">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <strong><span style="font-family:'Times New Roman'; ">Capaian Pembelajaran</span></strong>
                    </p>
                </td>
                <td
                    style="width:270.15pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:middle">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <strong><em><span style="font-family:'Times New Roman'; ">Learning Outcome</span></em></strong>
                    </p>
                </td>
            </tr>

            @foreach ($hasilCapaian as $hc)
                @if (isset($hc->subs))
                    @foreach ($hc->subs as $sub)
                        <tr style="height:13.5pt; page-break-inside: avoid;">
                            <td colspan="4" style="width:41.3pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt">
                                    <strong><em><span style="font-family:'Times New Roman'; ">&#xa0;</span></em></strong>
                                </p>
                            </td>
                            <td colspan="3" style="width:36.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt">
                                    <span style="font-family:'Times New Roman'">&#xa0;</span>
                                </p>
                            </td>
                            <td colspan="3" style="width:36.05pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                                <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                                    <span style="font-family:'Times New Roman'">&#xa0;</span>
                                </p>
                            </td>
                            <td colspan="6" style="width:78.35pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                                <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                                    <span style="font-family:'Times New Roman'">&#xa0;</span>
                                </p>
                            </td>
                            <td style="width:270.15pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                                <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                                    <span style="font-family:'Times New Roman'">&#xa0;</span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:13.5pt; page-break-inside: avoid;">
                            <td colspan="16"
                                style="width:224.5pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle">
                                <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                                    <strong><span style="font-family:'Times New Roman'; ">{{$sub->judul}}</span></strong>
                                </p>
                            </td>
                            <td
                                style="width:270.15pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:middle">
                                <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                                    <strong><span style="font-family:'Times New Roman'; ">{{$sub->judul_en}}</span></strong>
                                </p>
                            </td>
                        </tr>
                        <tr style="height:13.5pt; page-break-inside: avoid;">
                            <td colspan="4" style="width:41.3pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top">
                                <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                                    <strong><span style="font-family:'Times New Roman'; ">&#xa0;</span></strong>
                                </p>
                            </td>
                            <td colspan="3" style="width:36.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt">
                                    <span style="font-family:'Times New Roman'">&#xa0;</span>
                                </p>
                            </td>
                            <td colspan="3" style="width:36.05pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                                <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                                    <span style="font-family:'Times New Roman'">&#xa0;</span>
                                </p>
                            </td>
                            <td colspan="6" style="width:78.35pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                                <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                                    <span style="font-family:'Times New Roman'">&#xa0;</span>
                                </p>
                            </td>
                            <td style="width:270.15pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                                <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                                    <span style="font-family:'Times New Roman'">&#xa0;</span>
                                </p>
                            </td>
                        </tr>

                        @if (isset($sub->list))
                            @foreach ($sub->list as $listKey => $listItem)
                                <tr style="height:28.5pt">
                                    <td colspan="4"
                                        style="width:41.3pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle">
                                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt">
                                            <span style="font-family:'Times New Roman'">{{ $listKey + 1 }}</span>
                                        </p>
                                    </td>
                                    <td colspan="12"
                                        style="width:172.4pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:middle">
                                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                                            <span style="font-family:'Times New Roman'">{{ $listItem->teks }}</span>
                                        </p>
                                    </td>
                                    <td
                                        style="width:270.15pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:middle">
                                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                                            <span style="font-family:'Times New Roman'">{{ $listItem->teks_en }}</span>
                                        </p>
                                    </td>
                                </tr>
                            @endforeach
                        @elseif (isset($sub->subs))
                            @foreach ($sub->subs as $subKey => $subItem)
                                @if ($subKey != 0)
                                <tr style="height:13.5pt; page-break-inside: avoid;">
                                    <td colspan="4"
                                        style="width:41.3pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:middle">
                                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                                            <strong><span style="font-family:'Times New Roman'; ">&#xa0;</span></strong>
                                        </p>
                                    </td>
                                    <td colspan="3"
                                        style="width:36.4pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:middle">
                                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                                            <span style="font-family:'Times New Roman'">&#xa0;</span>
                                        </p>
                                    </td>
                                    <td colspan="3"
                                        style="width:36.05pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:middle">
                                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                                            <span style="font-family:'Times New Roman'">&#xa0;</span>
                                        </p>
                                    </td>
                                    <td colspan="6"
                                        style="width:78.35pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:middle">
                                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                                            <span style="font-family:'Times New Roman'">&#xa0;</span>
                                        </p>
                                    </td>
                                    <td
                                        style="width:270.15pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                                            <span style="font-family:'Times New Roman'">&#xa0;</span>
                                        </p>
                                    </td>
                                </tr>
                                @endif
                                <tr style="height:13.5pt; page-break-inside: avoid;">
                                    <td colspan="16"
                                        style="width:224.5pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle">
                                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                                            <strong><span style="font-family:'Times New Roman'; ">{{ $subItem->judul }}</span></strong>
                                        </p>
                                    </td>
                                    <td
                                        style="width:270.15pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle">
                                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                                            <strong><span style="font-family:'Times New Roman'; ">{{ $subItem->judul_en }}</span></strong>
                                        </p>
                                    </td>
                                </tr>
                                <tr style="height:13.5pt; page-break-inside: avoid;">
                                    <td colspan="4"
                                        style="width:41.3pt; border-top-style:solid; border-top-width:0.75pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:middle">
                                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                                            <strong><span style="font-family:'Times New Roman'; ">&#xa0;</span></strong>
                                        </p>
                                    </td>
                                    <td colspan="3"
                                        style="width:36.4pt; border-top-style:solid; border-top-width:0.75pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:middle">
                                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                                            <span style="font-family:'Times New Roman'">&#xa0;</span>
                                        </p>
                                    </td>
                                    <td colspan="3"
                                        style="width:36.05pt; border-top-style:solid; border-top-width:0.75pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:middle">
                                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                                            <span style="font-family:'Times New Roman'">&#xa0;</span>
                                        </p>
                                    </td>
                                    <td colspan="6"
                                        style="width:78.35pt; border-top-style:solid; border-top-width:0.75pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:middle">
                                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                                            <span style="font-family:'Times New Roman'">&#xa0;</span>
                                        </p>
                                    </td>
                                    <td
                                        style="width:270.15pt; border-top-style:solid; border-top-width:0.75pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                                        <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                                            <span style="font-family:'Times New Roman'">&#xa0;</span>
                                        </p>
                                    </td>
                                </tr>

                                @if (isset($subItem->list))
                                    @foreach ($subItem->list as $subItemListKey => $subItemListItem)
                                        <tr style="height:90.75pt">
                                            <td colspan="4"
                                                style="width:41.3pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle">
                                                <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt">
                                                    <span style="font-family:'Times New Roman'">{{ $subItemListKey + 1 }}</span>
                                                </p>
                                            </td>
                                            <td colspan="12"
                                                style="width:172.4pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:middle">
                                                <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                                                    <span style="font-family:'Times New Roman'">{{ $subItemListItem->teks }}</span>
                                                </p>
                                            </td>
                                            <td
                                                style="width:270.15pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:middle">
                                                <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                                                    <span style="font-family:'Times New Roman'">{{ $subItemListItem->teks_en }}</span>
                                                </p>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                @endif
            @endforeach

            <tr style="height:26.25pt">
                <td colspan="2"
                    style="width:35.9pt; border-top-style:solid; border-top-width:0.75pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:middle">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
                <td colspan="12"
                    style="width:172.4pt; border-top-style:solid; border-top-width:0.75pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:middle">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
                <td colspan="3"
                    style="width:275.55pt; border-top-style:solid; border-top-width:0.75pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:middle">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
            </tr>
            <tr style="height:27.5pt">
                <td colspan="3"
                    style="width:36.4pt; border-top-style:solid; border-top-width:0.75pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.4pt; padding-left:5.03pt; vertical-align:middle; background-color:#92d050">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt">
                        <strong><span style="font-family:'Times New Roman'; ">B.</span></strong>
                    </p>
                </td>
                <td colspan="14"
                    style="width:458.25pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom; background-color:#92d050">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <strong><span style="font-family:'Times New Roman'; ">AKTIFITAS PRESTASI DAN
                                PENGHARGAAN</span></strong>
                    </p>
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <strong><em><span
                                    style="font-family:'Times New Roman'; ">&#xa0;</span></em></strong><strong><em><span
                                    style="font-family:'Times New Roman'; ">ACHIEVEMENT ACTIVITIES AND
                                    AWARDS</span></em></strong>
                    </p>
                </td>
            </tr>
            <tr style="height:13.5pt; page-break-inside: avoid;">
                <td colspan="3" style="width:36.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <strong><em><span style="font-family:'Times New Roman'; ">&#xa0;</span></em></strong>
                    </p>
                </td>
                <td colspan="2"
                    style="width:36.4pt; border-top-style:solid; border-top-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
                <td colspan="4"
                    style="width:36.05pt; border-top-style:solid; border-top-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
                <td colspan="6"
                    style="width:78.35pt; border-top-style:solid; border-top-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
                <td colspan="2"
                    style="width:275.05pt; border-top-style:solid; border-top-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
            </tr>
            <tr style="height:13.5pt; page-break-inside: avoid;">
                <td colspan="3"
                    style="width:36.4pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle">
                    <ol type="1" style="margin:0pt; padding-left:0pt">
                        <li
                            style="margin-left:31.25pt; text-align:center; padding-left:4.75pt; font-family:'Times New Roman'; font-size:11pt">
                            &#xa0;
                        </li>
                    </ol>
                </td>
                <td colspan="12"
                    style="width:172.4pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <span style="font-family:'Times New Roman'">Juara II "Lomba Futsal" Dalam Acara Pekan Kreatif
                            Mahasiswa (PKM) 2015 di STMIK EL Rahma</span>
                    </p>
                </td>
                <td colspan="2"
                    style="width:275.05pt; border-style:solid; border-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <span style="font-family:'Times New Roman'">Second Place "Futsal Competition" in Student
                            Creative
                            Week (PKM) 2015 at STMIK EL Rahma</span>
                    </p>
                </td>
            </tr>
            <tr style="height:15pt">
                <td colspan="4" style="width:41.3pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
                <td colspan="3" style="width:36.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
                <td style="width:15.9pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
                <td colspan="9" style="width:379.45pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt">
                        <span style="font-family:'Times New Roman'">Yogyakarta, 30 Oktober 2021</span><span
                            style="font-family:'Times New Roman'">&#xa0; </span>
                    </p>
                </td>
            </tr>
            <tr style="height:15pt">
                <td colspan="4" style="width:41.3pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
                <td colspan="3" style="width:36.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
                <td style="width:15.9pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
                <td colspan="9" style="width:379.45pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt">
                        <span style="font-family:'Times New Roman'">Ketua Sekolah Tinggi Manajemen Informatika dan Ilmu
                            Komputer</span>
                    </p>
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt">
                        <span style="font-family:'Times New Roman'">El Rahma Yogyakarta</span>
                    </p>
                </td>
            </tr>
            <tr style="height:13.5pt; page-break-inside: avoid;">
                <td colspan="4" style="width:41.3pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
                <td colspan="3" style="width:36.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
                <td style="width:15.9pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
                <td colspan="8" style="width:98.5pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
                <td style="width:270.15pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
            </tr>
            <tr style="height:13.5pt; page-break-inside: avoid;">
                <td colspan="4" style="width:41.3pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
                <td colspan="3" style="width:36.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
                <td style="width:15.9pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
                <td colspan="8" style="width:98.5pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
                <td style="width:270.15pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
            </tr>
            <tr style="height:13.5pt; page-break-inside: avoid;">
                <td colspan="4" style="width:41.3pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
                <td colspan="3" style="width:36.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
                <td style="width:15.9pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
                <td colspan="8" style="width:98.5pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
                <td style="width:270.15pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:11pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
            </tr>
            <tr style="height:13.5pt; page-break-inside: avoid;">
                <td colspan="4" style="width:41.3pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
                <td colspan="3" style="width:36.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
                <td style="width:15.9pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
                <td colspan="9" style="width:379.45pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt">
                        <span style="font-family:'Times New Roman'">Eko Riswanto, S.T., M.Cs</span>
                    </p>
                </td>
            </tr>
            <tr style="height:4.35pt">
                <td colspan="4" style="width:41.3pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
                <td colspan="3" style="width:36.4pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
                <td style="width:15.9pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt">
                        <span style="font-family:'Times New Roman'">&#xa0;</span>
                    </p>
                </td>
                <td colspan="9" style="width:379.45pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:11pt">
                        <span style="font-family:'Times New Roman'">NIP 197501152005011002</span>
                    </p>
                </td>
            </tr>
            <tr style="height:0pt">
                <td style="width:31.6pt">
                </td>
                <td style="width:15.1pt">
                </td>
                <td style="width:0.5pt">
                </td>
                <td style="width:4.9pt">
                </td>
                <td style="width:42.3pt">
                </td>
                <td style="width:0.35pt">
                </td>
                <td style="width:4.55pt">
                </td>
                <td style="width:26.7pt">
                </td>
                <td style="width:15.25pt">
                </td>
                <td style="width:4.9pt">
                </td>
                <td style="width:3.35pt">
                </td>
                <td style="width:35.1pt">
                </td>
                <td style="width:17.9pt">
                </td>
                <td style="width:27.4pt">
                </td>
                <td style="width:0.5pt">
                </td>
                <td style="width:4.9pt">
                </td>
                <td style="width:280.95pt">
                </td>
            </tr>
        </table>
    </div>
    <br style="clear:both; mso-break-type:section-break">
    <div>
        <p style="margin-top:0pt; margin-bottom:10pt">
            <span style="font-family:'Times New Roman'">&#xa0;</span>
        </p>
    </div>
    <br style="clear:both; mso-break-type:section-break">
    <div>
        <p style="margin-top:0pt; margin-bottom:10pt">
            <span style="font-family:'Times New Roman'">&#xa0;</span>
        </p>
    </div>
</body>

</html>
