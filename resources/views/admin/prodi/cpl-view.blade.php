@extends('admin.layout')
@section('title', 'Ubah CPL Program Studi - ')

@section('content')
<div class="pagetitle">
    <h1>CPL Program Studi</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item">Program Studi</li>
            <li class="breadcrumb-item active">CPL</li>
            <li class="breadcrumb-item">Arsip</li>
            <li class="breadcrumb-item active">Lihat</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        <div class="col-md-10">
            <div class="card overflow-auto" id="app">
                <div class="card-body" style="min-height: 300px">
                    <div>
                        <div class="card-title row justify-content-between align-items-center">
                            <div class="col-md-6">
                                {{ $prodi->nama }} / <small class="text-muted">{{$prodi->nama_en}}</small> ({{ $cpl->tahun_kurikulum }})
                            </div>
                            <div class="col-md-6 text-end">
                                <a href="{{ route('admin.prodi.list-cpl', ['id' => $prodi->id]) }}"
                                    class="btn btn-sm btn-outline-primary"><i class="bi bi-arrow-left"></i> Kembali</a>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-12" v-if="!!kualifikasiCplData">
                                <div class="mb-2">
                                    <div>
                                        <span>Informasi Tentang Kualifikasi dan Hasil yang Dicapai</span>
                                    </div>
                                </div>
                                <table class="table table-bordered" v-if="!cplEditMode">
                                    <tbody v-for="(item, index) in kualifikasiCplData">
                                        {{-- <tr>
                                            <th class="text-center bg-secondary text-white" style="width: 15px">A</th>
                                            <th class="bg-secondary text-white">@{{ item.judul }}</th>
                                            <th class="bg-secondary text-white">@{{ item.judul_en }}</th>
                                        </tr> --}}
                                        <template v-if="item && item.subs">
                                            <template v-for="(subItem, subIndex) in item.subs">
                                                <tr>
                                                    <th style="background-color: #ddd"></th>
                                                    <th class="" style="background-color: #ddd">@{{ subItem.judul }}
                                                    </th>
                                                    <th class="" style="background-color: #ddd">@{{ subItem.judul_en }}
                                                    </th>
                                                </tr>
                                                <template v-if="subItem && subItem.list">
                                                    <template
                                                        v-for="(subItemListItem, subItemListItemIndex) in subItem.list">
                                                        <tr>
                                                            <td>@{{ subItemListItemIndex + 1 }}</td>
                                                            <td class="">@{{ subItemListItem.teks }}</td>
                                                            <td class="">@{{ subItemListItem.teks_en }}</td>
                                                        </tr>
                                                    </template>
                                                </template>
                                                <template v-else-if="subItem && subItem.subs">
                                                    <template
                                                        v-for="(subItemListItem, subItemListItemIndex) in subItem.subs">
                                                        <tr>
                                                            <th></th>
                                                            <th class="small">@{{ subItemListItem.judul }}</th>
                                                            <th class="small">@{{ subItemListItem.judul_en }}</th>
                                                        </tr>

                                                        <template v-if="subItemListItem && subItemListItem.list">
                                                            <template
                                                                v-for="(subItemListItemListItem, subItemListItemListItemIndex) in subItemListItem.list">
                                                                <tr>
                                                                    <td>@{{ subItemListItemListItemIndex + 1 }}</td>
                                                                    <td class="">
                                                                        @{{ subItemListItemListItem.teks }}
                                                                    </td>
                                                                    <td class="">
                                                                        @{{ subItemListItemListItem.teks_en }}
                                                                    </td>
                                                                </tr>
                                                            </template>
                                                        </template>
                                                    </template>
                                                </template>
                                            </template>
                                        </template>
                                    </tbody>
                                </table>

                                <table class="table table-bordered" v-else>
                                    <tbody v-for="(item, index) in kualifikasiCplData">
                                        {{-- <tr>
                                            <th class="text-center bg-secondary text-white" style="width: 15px">A</th>
                                            <th class="bg-secondary">
                                                <input type="text"
                                                    :name="`pengaturan_hasil_capaian_data[${index}][judul]`"
                                                    class="form-control" v-model="item.judul">
                                            </th>
                                            <th class="bg-secondary">
                                                <input type="text"
                                                    :name="`pengaturan_hasil_capaian_data[${index}][judul_en]`"
                                                    class="form-control" v-model="item.judul_en">
                                            </th>
                                            <th style="width: 15px"></th>
                                        </tr> --}}
                                        <template v-if="item && item.subs">
                                            <template v-for="(subItem, subIndex) in item.subs">
                                                <tr>
                                                    <th style="background-color: #ddd"></th>
                                                    <th class="" style="background-color: #ddd">
                                                        <input type="text"
                                                            :name="`pengaturan_hasil_capaian_data[${index}][subs][${subIndex}][judul]`"
                                                            class="form-control" v-model="subItem.judul">
                                                    </th>
                                                    <th class="" style="background-color: #ddd">
                                                        <input type="text"
                                                            :name="`pengaturan_hasil_capaian_data[${index}][subs][${subIndex}][judul_en]`"
                                                            class="form-control" v-model="subItem.judul_en">
                                                    </th>
                                                    <th>
                                                        <button class="btn btn-sm btn-danger" title="Hapus"
                                                            type="button" @click="deleteJudul(index, subIndex)">
                                                            <i class="bi bi-x"></i></button>
                                                    </th>
                                                </tr>
                                                <template v-if="subItem && subItem.list">
                                                    <template
                                                        v-for="(subItemListItem, subItemListItemIndex) in subItem.list">
                                                        <tr>
                                                            <td>@{{ subItemListItemIndex + 1 }}</td>
                                                            <td class="">
                                                                <input type="text"
                                                                    :name="`pengaturan_hasil_capaian_data[${index}][subs][${subIndex}][list][${subItemListItemIndex}][teks]`"
                                                                    class="form-control" v-model="subItemListItem.teks">
                                                            </td>
                                                            <td class="">
                                                                <input type="text"
                                                                    :name="`pengaturan_hasil_capaian_data[${index}][subs][${subIndex}][list][${subItemListItemIndex}][teks_en]`"
                                                                    class="form-control"
                                                                    v-model="subItemListItem.teks_en">
                                                            </td>
                                                            <td>
                                                                <button class="btn btn-sm btn-danger" type="button"
                                                                    @click="deleteSubItem(index, subIndex, subItemListItemIndex)">
                                                                    <i class="bi bi-x"></i></button>
                                                            </td>
                                                        </tr>
                                                    </template>
                                                </template>
                                                <tr>
                                                    <td style="background-color: #fff" colspan="4">
                                                        <div class="d-flex align-items-center justify-content-center">
                                                            <button type="button" class="btn btn-sm btn-secondary ms-2"
                                                                style="font-size: 10px"
                                                                @click="addItemSubItem(index, subIndex)">Tambah
                                                                Item</button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <template v-if="subItem && subItem.subs">
                                                    <template
                                                        v-for="(subItemListItem, subItemListItemIndex) in subItem.subs">
                                                        <tr>
                                                            <th></th>
                                                            <th class="small">
                                                                <input type="text"
                                                                    :name="`pengaturan_hasil_capaian_data[${index}][subs][${subIndex}][subs][${subItemListItemIndex}][judul]`"
                                                                    class="form-control"
                                                                    v-model="subItemListItem.judul">
                                                            </th>
                                                            <th class="small">
                                                                <input type="text"
                                                                    :name="`pengaturan_hasil_capaian_data[${index}][subs][${subIndex}][subs][${subItemListItemIndex}][judul_en]`"
                                                                    class="form-control"
                                                                    v-model="subItemListItem.judul_en">
                                                            </th>
                                                            <td>
                                                                <button class="btn btn-sm btn-danger" type="button"
                                                                    @click="deleteSubJudul(index, subIndex, subItemListItemIndex)">
                                                                    <i class="bi bi-x"></i></button>
                                                            </td>
                                                        </tr>

                                                        <template v-if="subItemListItem && subItemListItem.list">
                                                            <template
                                                                v-for="(subItemListItemListItem, subItemListItemListItemIndex) in subItemListItem.list">
                                                                <tr>
                                                                    <td>@{{ subItemListItemListItemIndex + 1 }}</td>
                                                                    <td class="">
                                                                        <input type="text"
                                                                            :name="`pengaturan_hasil_capaian_data[${index}][subs][${subIndex}][subs][${subItemListItemIndex}][list][${subItemListItemListItemIndex}][teks]`"
                                                                            class="form-control"
                                                                            v-model="subItemListItemListItem.teks">
                                                                    </td>
                                                                    <td class="">
                                                                        <input type="text"
                                                                            :name="`pengaturan_hasil_capaian_data[${index}][subs][${subIndex}][subs][${subItemListItemIndex}][list][${subItemListItemListItemIndex}][teks_en]`"
                                                                            class="form-control"
                                                                            v-model="subItemListItemListItem.teks_en">
                                                                    </td>
                                                                    <td>
                                                                        <button class="btn btn-sm btn-danger"
                                                                            type="button"
                                                                            @click="deleteSubItemListItem(index, subIndex, subItemListItemIndex, subItemListItemListItemIndex)">
                                                                            <i class="bi bi-x"></i></button>
                                                                    </td>
                                                                </tr>
                                                            </template>
                                                        </template>

                                                        <tr>
                                                            <td style="background-color: #fff" colspan="4">
                                                                <div
                                                                    class="d-flex align-items-center justify-content-center">
                                                                    <button type="button"
                                                                        class="btn btn-sm btn-secondary ms-2"
                                                                        style="font-size: 10px"
                                                                        @click="addItemSubItemListItem(index, subIndex, subItemListItemIndex)">Tambah
                                                                        Item</button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </template>
                                                </template>
                                                <tr>
                                                    <td style="background-color: #fff" colspan="4">
                                                        <div class="d-flex align-items-center justify-content-center">
                                                            <button type="button" class="btn btn-sm btn-secondary"
                                                                style="font-size: 10px"
                                                                @click="addItemSubJudul(index, subIndex)">Tambah
                                                                Subjudul</button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </template>
                                            <tr>
                                                <td style="background-color: #fff" colspan="4">
                                                    <div class="d-flex justify-content-center">
                                                        <button type="button" class="btn btn-sm btn-dark small"
                                                            @click="addItemJudul(index)">Tambah Judul</button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </template>
                                    </tbody>
                                </table>

                            </div>
                            <div class="col-md-12" v-if="loading">
                                <div class="d-flex justify-content-center align-items-center" style="height: 200px">
                                    <div class="spinner-border text-primary" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@3"></script>


<script type="text/javascript">
    const api = axios.create({
        baseURL: "{{ url('api') }}",
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}",
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        }
    });

    const cplData = @json($cpl);

    const app = Vue.createApp({
        data() {
            return {
                kualifikasiCplData: JSON.parse(cplData?.data ?? '[]'),
                cplEditMode: false,
                loading: true,
            }
        },
        mounted() {
            console.log('kualifikasiCplData', this.kualifikasiCplData)
            this.loading = false;
        },
        computed: {
            kualifikasiCplDataStringify() {
                return !!this.kualifikasiCplData ? JSON.stringify(this.kualifikasiCplData) : ''
            },
        },
        methods: {
        }
    });

    app.mount('#app');
</script>


@endpush
