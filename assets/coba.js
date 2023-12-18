const form = document.getElementById('form');
const nama = document.getElementById('nama');
const usia = document.getElementById('usia');
const asal_kota = document.getElementById('asal_kota');
const jenis_kelamin = document.getElementById('jenis_kelamin');
const cabang_lomba = document.getElementById('cabang_lomba');
const tanggal_daftar = document.getElementById('tanggal_daftar');

form.addEventListener('submit', e => {
    e.preventDefault();
    if (checkFormValidity()) {
        form.submit();
    }
});

const setError = (element, message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = message;
    inputControl.classList.add('error');
    inputControl.classList.remove('success');
}

const setSuccess = element => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = '';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
};

const checkFormValidity = () => {
    let isValid = true;

    const namaValue = nama.value.trim();
    const usiaValue = usia.value.trim();
    const asal_kotaValue = asal_kota.value.trim();
    const jenis_kelaminValue = jenis_kelamin.value.trim();
    const cabang_lombaValue = cabang_lomba.value.trim();
    const tanggal_daftarValue = tanggal_daftar.value.trim();

    if (namaValue === '') {
        setError(nama, 'Nama is required');
        isValid = false;
    } else {
        setSuccess(nama);
    }

    if (usiaValue === '') {
        setError(usia, 'Usia is required');
        isValid = false;
    } else {
        setSuccess(usia);
    }

    if (asal_kotaValue === '') {
        setError(asal_kota, 'Asal Kota is required');
        isValid = false;
    } else {
        setSuccess(asal_kota);
    }

    if (jenis_kelaminValue === '') {
        setError(jenis_kelamin, 'Jenis Kelamin is required');
        isValid = false;
    } else {
        setSuccess(jenis_kelamin);
    }

    if (cabang_lombaValue === '') {
        setError(cabang_lomba, 'Cabang Lomba is required');
        isValid = false;
    } else {
        setSuccess(cabang_lomba);
    }

    if (tanggal_daftarValue === '') {
        setError(tanggal_daftar, 'Tanggal Daftar is required');
        isValid = false;
    } else {
        setSuccess(tanggal_daftar);
    }

    return isValid;
};
