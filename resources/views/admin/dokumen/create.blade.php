@extends('admin.layout')
@section('title', 'Buat Dokumen SKPI - ')

@section('content')

<?php

if (!function_exists('getBackUrl')) {
	function getBackUrl()
	{
		$ref = request()->query('ref');
		if ($ref == 'mahasiswa') {
			return route('admin.mahasiswa.index');
		} else if ($ref == 'pengajuan') {
			return route('admin.pengajuan.index');
		}
		return route('admin.dokumen.index');
	}
}

?>

<div class="pagetitle">
    <h1>Buat Dokumen SKPI</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item">Dokumen SKPI</li>
            <li class="breadcrumb-item active">Buat Baru</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row" id="app">
        <div class="col-md-9">
            <div class="card overflow-auto">
                <div class="card-body" style="min-height: 300px">
                    <div class="card-title d-flex justify-content-between">
                        <a href="{{ getBackUrl() }}" class="btn btn-sm btn-outline-primary"><i
                                class="bi bi-arrow-left"></i> Kembali</a>
                        <span class="text-danger small">Bertanda *) wajib diisi</span>
                    </div>

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                            <li class="small">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{ route('admin.dokumen.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 d-none">
                                <div class="mb-3">
                                    <label for="dokumen_nomor" class="form-label">No. Dokumen</label>
                                    <input type="text" name="dokumen_nomor" id="dokumen_nomor"
                                        class="form-control @error('dokumen_nomor') is-invalid @enderror"
                                        value="{{ $noDokumen }}" disabled placeholder="Nomor dokumen">
                                    @error('dokumen_nomor')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 d-none">
                                <div class="mb-3">
                                    <label for="dokumen_tanggal" class="form-label">Tgl. Dokumen</label>
                                    <input type="date" name="dokumen_tanggal" id="dokumen_tanggal"
                                        class="form-control @error('dokumen_tanggal') is-invalid @enderror"
                                        value="{{ old('dokumen_tanggal', date('Y-m-d')) }}" placeholder="Tgl. Dokumen">
                                    @error('dokumen_tanggal')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="dokumen_tanggal" class="form-label">Tgl. Dokumen</label>
                                    <input type="date" name="dokumen_tanggal" id="dokumen_tanggal"
                                        class="form-control @error('dokumen_tanggal') is-invalid @enderror"
                                        value="{{ old('dokumen_tanggal', date('Y-m-d')) }}" placeholder="Tgl. Dokumen">
                                    @error('dokumen_tanggal')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="jenjang_id" class="form-label">Jenjang <span
                                            class="text-danger">*</span></label>
                                    <select name="jenjang_id" id="jenjang_id"
                                        class="form-select @error('jenjang_id') is-invalid @enderror"
                                        v-model="selectedJenjang" @change="getProdiData">
                                        <option value="">-- Pilih Jenjang --</option>
                                        <option v-for="item in jenjangData" :value="item.id">@{{ item.nama }}</option>
                                    </select>
                                    @error('jenjang_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6" v-if="selectedJenjang">
                                <div class="mb-3">
                                    <label for="program_studi_id" class="form-label">Program Studi <span
                                            class="text-danger">*</span></label>
                                    <select name="program_studi_id" id="program_studi_id"
                                        class="form-select @error('program_studi_id') is-invalid @enderror"
                                        v-model="selectedProdi" @change="getMahasiswaData">
                                        <option value="">-- Pilih Program Studi --</option>
                                        <option v-for="item in prodiData" :value="item.id">@{{ item.nama }}</option>
                                    </select>
                                    @error('program_studi_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6" v-if="selectedProdi">
                                <div class="mb-3">
                                    <div :class="loadingMahasiswa ? 'mb-2' : 'mb-1'">Mahasiswa <span
                                            class="text-danger">*</span></div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="d-flex justify-content-start mb-2">
                                                <div class="spinner-border spinner-border-sm text-primary" role="status"
                                                    v-if="loadingMahasiswa">
                                                    <span class="visually-hidden">Loading...</span>
                                                </div>
                                                <div class="text-secondary small" v-else style="flex: 1"></div>
                                                <div class="form-check"
                                                    v-if="!checkAllMahasiswa && mahasiswaData.length">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        name="semua_mahasiswa" id="semua_mahasiswa"
                                                        v-model="checkAllMahasiswa">
                                                    <label class="form-check-label" for="semua_mahasiswa">
                                                        Pilih Semua
                                                    </label>
                                                </div>
                                                <button v-if="selectedMahasiswa.length" type="button"
                                                    class="btn btn-sm btn-outline-primary ms-2 p-1 py-0"
                                                    @click="selectedMahasiswa = []">
                                                    <i class="bi bi-x"></i> Hapus Semua
                                                </button>
                                            </div>
                                            <div class="mb-3">


                                                <!-- Create custom multiple select -->
                                                <div class="mt-2 p-2" style="border: 1px solid #ddd">
                                                    <div v-for="item in mahasiswaData" :key="item.id"
                                                        class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                            :id="'mahasiswa_' + item.id" :name="'mahasiswa_ids[]'"
                                                            :value="item.id" v-model="selectedMahasiswa">
                                                        <label class="form-check-label" :for="'mahasiswa_' + item.id">
                                                            @{{ item.nama }} (@{{ item.nim }}) <span
                                                                v-if="item.is_have_skpi" class="badge bg-success">Sudah
                                                                dibuat</span>
                                                        </label>
                                                    </div>
                                                    <div v-if="mahasiswaData.length == 0" class="text-secondary mt-2">
                                                        Tidak ada mahasiswa
                                                    </div>

                                                </div>

                                                @error('mahasiswa_ids')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror

                                                <div class="text-danger mt-1" v-if="isAlreadyHaveSkpiCount > 0">
                                                    <small style="font-size: 80%">Terdapat @{{ isAlreadyHaveSkpiCount }}
                                                        mahasiswa yang sudah dibuatkan SKPI. Jika Anda memilih mahasiswa
                                                        tersebut, maka file yang sudah ada akan ditimpa.</small>
                                                </div>

                                                <div class="text-secondary mt-1" v-if="mahasiswaData.length > 0">
                                                    <small style="font-size: 80%">Pilih mahasiswa yang ingin dibuatkan
                                                        dokumen.
                                                        Gunakan tombol
                                                        <!-- <strong>Ctrl</strong> untuk memilih lebih dari
														satu mahasiswa. -->
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary" :disabled="!isFormValid">Simpan & Buat
                                SKPI</button>
                        </div>

                        <hr />

                        <div class="row mt-3">
                            <div class="col-md-12" v-if="!!pengaturanHasilCapaianData && !!selectedProdi">
                                <div class="mb-2">
                                    <div>
                                        <span>Informasi Tentang Kualifikasi dan Hasil yang Dicapai</span>

                                        <button style="font-size: 0.8rem; padding: 0.2rem 0.35rem; line-height: 1rem;"
                                            type="button" class="ms-2 btn btn-sm btn-outline-primary"
                                            @click="openEditCplPage">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                    </div>
                                </div>
                                <table class="table table-bordered" v-if="!pengaturanHasilCapaianInEditMode">
                                    <tbody v-for="(item, index) in pengaturanHasilCapaianData">

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
                                    <tbody v-for="(item, index) in pengaturanHasilCapaianData">

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
                        </div>

                        <textarea name="cpl" :value="pengaturanHasilCapaianDataStringify"
                            style="display: none;"></textarea>

                        <div class="mb-3" v-if="!!pengaturanHasilCapaianData && !!selectedProdi">
                            <button type="submit" class="btn btn-primary" :disabled="!isFormValid">Simpan & Buat
                                SKPI</button>
                        </div>

                    </form>
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

	const jenjangData = {!! json_encode($jenjang) !!};
    const selectedJenjang = {!! json_encode($selectedJenjangId) !!};
    const selectedProdi = {!! json_encode($selectedProdiId) !!};
    const selectedMahasiswa = {!! json_encode($selectedMahasiswaId) !!};
    const pengaturanHasilCapaianData = {!! json_encode($pengaturanHasilCapaian) !!};
    const pengaturanHasilCapaianInEditMode = false;

	const app = Vue.createApp({
		data() {
			return {
				jenjangData: jenjangData,
				prodiData: [],
				mahasiswaData: [],
				loadingMahasiswa: false,
				selectedJenjang: selectedJenjang ?? '',
				selectedProdi: selectedProdi ?? '',
				checkAllMahasiswa: false,
				selectedMahasiswa: selectedMahasiswa ?? [],
				pengaturanHasilCapaianData: pengaturanHasilCapaianData || null,
				pengaturanHasilCapaianInEditMode: false,
			}
		},
		mounted() {
			if (this.selectedJenjang) {
				this.getProdiData();
			}
			if (this.selectedProdi) {
				this.getMahasiswaData();
			}

			if (this.selectedMahasiswa.length == this.mahasiswaData.length) {
				this.checkAllMahasiswa = true;
			}
		},
		computed: {
			isFormValid() {
				return this.selectedJenjang != '' && this.selectedProdi != '' && this.selectedMahasiswa.length > 0;
			},
			isAlreadyHaveSkpiCount() {
				return this.mahasiswaData.filter(item => item.is_have_skpi).length;
			},
            pengaturanHasilCapaianDataStringify () {
              return this.pengaturanHasilCapaianData  ? JSON.stringify(this.pengaturanHasilCapaianData) : ''
            }
		},
		watch: {
			checkAllMahasiswa(val) {
				console.log('checkAllMahasiswa', val);
				if (val) {
					this.selectedMahasiswa = this.mahasiswaData.map(item => item.id);
				} else {
					// this.selectedMahasiswa = [];
				}
			},
			selectedMahasiswa(val) {
				if (val.length == this.mahasiswaData.length) {
					this.checkAllMahasiswa = true;
				} else {
					this.checkAllMahasiswa = false;
				}
			},
			selectedProdi(val) {
				if (val) {
                    this.getProdiDetailData()
				} else {
					this.pengaturanHasilCapaianData = null
					this.pengaturanHasilCapaianInEditMode = false
				}
			}
		},
		methods: {
			getProdiData() {
				if (this.selectedJenjang) {
                    this.selectedProdi = null
					this.mahasiswaData = [];
					api.get(`/v1/prodi`, {
							params: {
								jenjang_id: this.selectedJenjang
							}
						})
						.then(res => {
							console.log(res.data);
							this.prodiData = res.data?.data ?? [];
						})
						.catch(err => {
							console.log(err);
						})
				}
			},
			getProdiDetailData() {
				if (this.selectedProdi) {
					this.pengaturanHasilCapaianData = [];
					this.pengaturanHasilCapaianInEditMode = false
					api.get(`/v1/prodi/${this.selectedProdi}`)
						.then(res => {
							console.log(res.data);
							const prodiDetailData = res.data?.data;
							if (prodiDetailData) {
								console.log('prodiDetailData', prodiDetailData)
                              const kualifikasiCpl = JSON.parse(prodiDetailData.kualifikasi_cpl)
                              this.pengaturanHasilCapaianData = kualifikasiCpl
							}
						})
						.catch(err => {
							console.log(err);
						})
				}
			},
			getMahasiswaData() {
                if (this.selectedProdi) {
					this.checkAllMahasiswa = false;
					this.mahasiswaData = [];
					this.loadingMahasiswa = true;
					api.get(`/v1/mahasiswa-prodi`, {
							params: {
								prodi_id: this.selectedProdi
							}
						})
						.then(res => {
							console.log(res.data);
							this.mahasiswaData = res.data?.data ?? [];

							if (this.selectedMahasiswa.length == this.mahasiswaData.length) {
								this.checkAllMahasiswa = true;
							}
						})
						.catch(err => {
							console.log(err);
						})
						.finally(() => {
							this.loadingMahasiswa = false;
						})
				}
			},

            openEditCplPage () {
              const url = `/admin/prodi/${this.selectedProdi}/cpl`
              window.open(url, '_blank')
            },

			addItemJudul(index, subIndex) {
				this.pengaturanHasilCapaianData[index].subs.push({
					judul: '',
					judul_en: '',
					subs: [],
					list: [],
				});
			},
			addItemSubJudul(index, subIndex) {
				if (!this.pengaturanHasilCapaianData[index].subs[subIndex].subs) {
					this.pengaturanHasilCapaianData[index].subs[subIndex].subs = [];
				}
				this.pengaturanHasilCapaianData[index].subs[subIndex].subs.push({
					judul: 'Subjudul baru',
					judul_en: 'New subjudul',
					list: [],
				});
			},
			addItemSubItem(index, subIndex) {
				if (!this.pengaturanHasilCapaianData[index].subs[subIndex].list) {
					this.pengaturanHasilCapaianData[index].subs[subIndex].list = [];
				}
				this.pengaturanHasilCapaianData[index].subs[subIndex].list.push({
					teks: 'Item baru',
					teks_en: 'New item',
				});
			},
			addItemSubItemListItem(index, subIndex, subItemListItemIndex) {
				if (!this.pengaturanHasilCapaianData[index].subs[subIndex].subs[subItemListItemIndex].list) {
					this.pengaturanHasilCapaianData[index].subs[subIndex].subs[subItemListItemIndex].list = [];
				}
				this.pengaturanHasilCapaianData[index].subs[subIndex].subs[subItemListItemIndex].list.push({
					teks: 'Item baru',
					teks_en: 'New item',
				});
			},

			deleteJudul(index, subIndex) {
				this.pengaturanHasilCapaianData[index].subs.splice(subIndex, 1);
			},
			deleteSubJudul(index, subIndex, subItemListItemIndex) {
				this.pengaturanHasilCapaianData[index].subs[subIndex].subs.splice(subItemListItemIndex, 1);
			},
			deleteSubItem(index, subIndex, subItemListItemIndex) {
				this.pengaturanHasilCapaianData[index].subs[subIndex].list.splice(subItemListItemIndex, 1);
			},
			deleteSubItemListItem(index, subIndex, subItemListItemIndex, subItemListItemListItemIndex) {
				this.pengaturanHasilCapaianData[index].subs[subIndex].subs[subItemListItemIndex].list.splice(subItemListItemListItemIndex, 1);
			},
		}
	});

	app.mount('#app');
</script>


@endpush
