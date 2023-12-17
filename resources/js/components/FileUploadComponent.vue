<template>
    <div v-if="success != ''" class="alert alert-success">
        {{success}}
    </div>
    <form @submit="formSubmit" enctype="multipart/form-data">
        <div class="flex flex-col items-start justify-center mb-4 bg-grey-lighter">
            <label class="mb-4 w-64 flex flex-col items-center px-4 py-6 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue ">
                <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                </svg>
                <span class="mt-2 text-base leading-normal">{{ text }}</span>
                    <input type="file" class="form-control hidden" v-on:change="onChange">
            </label>
            <button class="btn btn-primary inline p-3 bg-black rounded-full text-white font-semibold w-200">Télécharger le fichier</button>
        </div>
    </form>

</template>
<script>
    export default {
        data() {
            return {
                name: '',
                file: '',
                success: '',
                text: 'Séléctionner une image'
            };
        },
        methods: {
            onChange(e) {
                this.file = e.target.files[0];
                this.text = 'Image importée';
            },
            formSubmit(e) {
                e.preventDefault();
                let existingObj = this;
                const config = {
                    headers: {
                        'content-type': 'multipart/form-data'
                    }
                }
                let data = new FormData();
                data.append('file', this.file);
                axios.post('/upload', data, config)
                    .then(function (res) {
                        existingObj.success = res.data.success;
                    })
                    .catch(function (err) {
                        existingObj.output = err;
                    });
            }
        }
    }
</script>