## make file in folder pasien, make file contain :
- [x] pasien : for show all data from all pasien from database
- [x] datapersonalpasien : show all data pasien and medical check up pasien from selected pasien in file pasien
- [x] tambahpasien : add data pasien to database
- [x] editpasien : edit data pasien from selected pasien 
- [x] hapuspasien : delete data selected pasien from database
- [ ] laporanpasien : make data pasien also they medical check up can be print and download as .pdf

## make file in folder catatanmedis, contain :
- [x] tambahperiksa : add data medical check up for selected pasien to database
- [x] editperiksa : edit data medical check up for selected pasien from selected pasien 
- [x] hapusperiksa : delete medical check up data from selected pasien from database


## Input Fields (Can be empty with a default value of "-")
- [x] Tanggal Lahir
- [x] No HP
- [x] Alamat
- [x] Pemeriksaan Fisik

## Additional Fields for Medical Check-up Pemeriksaan Fisik include :
- [x] Tensi 
- [x] Berat Badan
- [x] Tinggi Badan
- [x] Gula Darah
- [x] Golongan Darah

## Attribute Update
- [x] Kode: Updated to Nomor {lenght : 13, type : varchar}
- [x] if golongan darah have been input then the rest of it is same, bcs ppl cant change golongan darah


## Update delete function
- [x] if data from tbl_pasien is deleted, find from tbl_medical_check where nomor is same as nomor in tbl_pasien and delete it

## Update /  Edit folder user
- [x] make edit password user
- [x] fix any error in folder user

## Home Page 
- [x] the first data from table is the last tanggal_periksa added.

## Last thing before give to QA
- [ ] fix any error
- [ ] try in other device
- [ ] make Code Documentation
- [ ] make step by step installation web to client device in file README.md
