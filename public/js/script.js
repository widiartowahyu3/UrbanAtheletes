// ==================================================>
// Nav SideBar ======================================>

let item = document.querySelectorAll('.nav-sidebar li a');
item.forEach(link => {
    if (link.querySelector('p').innerHTML === link.getAttribute('data-nav')) {
        link.classList.toggle('active');
    }
});

// Nav SideBar Akhir ================================>
// ==================================================>

// ==================================================>
// action view gambar Ubah ==========================>
// function priviewImg() {
//     const img = document.querySelector('#image');
//     const imgPreview = document.querySelector('.img-previuw');
//     const imgLabel = document.querySelector('.img-label');

//     if (imgLabel) {
//         imgLabel.textContent = img.files[0].name;
//     }

//     const fileImg = new FileReader();
//     fileImg.readAsDataURL(img.files[0]);

//     // console.log(fileImg.target.result);

//     fileImg.onload = function (e) {
//         imgPreview.src = e.target.result;
//     }
// }
// action view gambar Ubah Akhir ====================>
// ==================================================>

// ==================================================>
// Form Disabled ====================================>

const btnUbah = document.getElementById('btn-ubah');
const btnSubmit = document.getElementById('submit');
if (btnUbah) {
    btnUbah.onclick = function () {
        let formInput = document.querySelectorAll('.form-control');
        formInput.forEach(input => {
            input.removeAttribute('disabled');
        });
        btnUbah.setAttribute('hidden', '');
        btnSubmit.toggleAttribute('hidden');
    };
};

// Akhir Form Disabled ==============================>
// ==================================================>

// ==================================================>
// action view gambar tambah ========================>

const inputImg = document.querySelectorAll('.input-img');
inputImg.forEach(function (el) {
    el.addEventListener('change', function (e) {
        let imgPreview = e.explicitOriginalTarget.nextElementSibling
        let imgLabel = imgPreview.nextElementSibling

        const fileImg = new FileReader();
        fileImg.readAsDataURL(e.srcElement.files[0]);

        fileImg.onload = function (e) {
            imgPreview.src = e.target.result;
        }

        imgLabel.textContent = e.srcElement.files[0].name;
    });
});

// action view gambar tambah Akhir ==================>
// ==================================================>

// ==================================================>
// checkbox_ktp =====================================>

const checkKtp = document.getElementById('checkbox_ktp');
if (checkKtp) {
    checkKtp.onclick = function () {
        const alamatKtp = document.getElementById('alamat_ktp')
        const toglAlamat = document.getElementById('alamat_tmpt_tinggal');
        toglAlamat.toggleAttribute('readonly')
        toglAlamat.setAttribute('value', alamatKtp.value)
        // console.log(alamatKtp.value);
    }
}

// checkbox_ktp Akhir ===============================>
// ==================================================>
