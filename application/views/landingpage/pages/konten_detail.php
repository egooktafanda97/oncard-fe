<section style="padding-top:200px;padding-left:150px;padding-right:150px;color:#4a4a4a!important;">
    <div class="row putcontenthere  mb-5 pb-5" style="">
    </div>
    
</section>

<script type="text/javascript">
    
    let idsett = '';
    let idgrupsett = '';
    let modesett = '';
    let numberArray = [];
    let sessionSet = '';
    let newArr = [];

    const sluggs = window.location.pathname.split("/").pop();
    
    console.log(sluggs.toString());

    $(document).ready(function () {
        // showDataX();
        getData();
    });

    function getData() {

        const save = async () => {
            const posts = await axios.post('https://oncard.id/Welcome/prphoenix_get_konten/181119ssjxx1717118FF22__2282111_1291/'+sluggs).catch((err) => {

                $("#toast-body").text('Data tidak ada!');
                toggleToast();

            });

            if (posts.status == 201||posts.status == 200) {

                console.log(posts.data);
                let no = 1;

                let html = '';
                
                posts.data.data.map((mapping, i) => {


                    const tanggalPosting = moment(mapping.dateCreated);

                    const selisihHari = moment().diff(tanggalPosting, 'days');
                    const selisihJam = moment().diff(tanggalPosting, 'hours');

                    // Membuat informasi posting
                    let infoPosting;
                    if (selisihHari === 0) {
                    if (selisihJam === 0) {
                        infoPosting = 'Publish kurang dari satu jam yang lalu';
                    } else {
                        infoPosting = `Publish ${selisihJam} jam yang lalu`;
                    }
                    } else if (selisihHari === 1) {
                    infoPosting = 'Publish kemarin';
                    } else if (selisihHari <= 7) {
                    infoPosting = `Publish ${selisihHari} hari yang lalu`;
                    } else {
                    infoPosting = `Publish pada ${tanggalPosting.format('D MMMM YYYY')}`;
                    }

                    html += `<div class="col-lg-8 col-md-12 col-12">
                    <img src="${mapping.thumbnail}" class="thumbnail " alt="" class="" style="border-radius:15px; overflow:hidden;width:100%;">
                    <div class="separator"></div>
                    
                    <h3 class="elegant2" style="font-weight:bold;font-size:auto;">${mapping.judul}</h3>
                    <font class="elegant2 text-muted" style="font-weight:normal;font-size:16px;line-height:1.8em;">
                    ${mapping.isi}
                    </font>
                    <div class="separator"></div>
                    <font class="penulis">${infoPosting}</font> | Diterbitkan oleh : <font class="penulis">${mapping.penulis}</font>
                </div>

                <div class="col-lg-4 col-md-12 col-12 putcontentterkait">
                </div>
                
                `;

                    
                });

                

                $('.putcontenthere').html(html);

                getDataTerkait();
              
            }

        }

        save();

    }
    
    
    function getDataTerkait() {

        const save = async () => {
            const posts = await axios.post('https://oncard.id/Welcome/prphoenix_get_konten/181119ssjxx1717118FF22__2282111_1291').catch((err) => {

                $("#toast-body").text('Data tidak ada!');
                toggleToast();

            });

            if (posts.status == 201||posts.status == 200) {

                console.log(posts.data);
                let no = 1;

                let html = '<h5 class="mb-3">Berita Terkait</h5>';
                
                posts.data.data.map((mapping, i) => {

                    if(sluggs!=mapping.slug){

                        const tanggalPosting = moment(mapping.dateCreated);

                        const selisihHari = moment().diff(tanggalPosting, 'days');
                        const selisihJam = moment().diff(tanggalPosting, 'hours');

                        // Membuat informasi posting
                        let infoPosting;
                        if (selisihHari === 0) {
                        if (selisihJam === 0) {
                            infoPosting = 'Publish kurang dari satu jam yang lalu';
                        } else {
                            infoPosting = `Publish ${selisihJam} jam yang lalu`;
                        }
                        } else if (selisihHari === 1) {
                        infoPosting = 'Publish kemarin';
                        } else if (selisihHari <= 7) {
                        infoPosting = `Publish ${selisihHari} hari yang lalu`;
                        } else {
                        infoPosting = `Publish pada ${tanggalPosting.format('D MMMM YYYY')}`;
                        }

                        html += `<div class="row">
                            <div class="col-3 text-center">
                            <img src="${mapping.thumbnail}" class="thumbnail mb-5" alt="" class="" style="border-radius:5px; overflow:hidden;width:70px; height:70px; object-fit:cover;">
                            </div>
                            <div class="col-9">
                                <p style="font-size:12px;cursor:pointer;" onclick="window.location.href='<?=base_url();?>Welcome/konten_detail/${mapping.slug}'">${mapping.judul}</p>
                            </div>
                        </div>`;

                    }else {
                        // html += `<div class="row">
                        //     <h3>Berita Terkait</h3>
                        //     <div class="col-12 text-start">
                        //         Tidak ada konten
                        //     </div>
                        // </div>`;
                    }

                    
                });

            

                

                $('.putcontentterkait').html(html);

              
            }

        }

        save();

    }
    
    function formatRupiah(angka, prefix){
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split   		= number_string.split(','),
        sisa     		= split[0].length % 3,
        rupiah     		= split[0].substr(0, sisa),
        ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if(ribuan){
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>