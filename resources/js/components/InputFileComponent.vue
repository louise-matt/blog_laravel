<template>
    <label xs12 class="text-xs-center text-sm-center text-md-center text-lg-center">

        <div class="flex flex-col items-start justify-center mb-4 bg-grey-lighter">
            <label class="mb-4 w-64 flex flex-col items-center px-4 py-6 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue ">
                <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                </svg>
                <span class="mt-2 text-base leading-normal">{{ imageName }}</span>
                <input
                    name="image"
                    type="file"
                    class="form-control hidden"
                    @change="onFilePicked"
                    ref="image"
                    accept="image/jpeg, image/jpg, image/png"
                >
            </label>
            <img :src="imageUrl" height="150" width="150" v-if="imageUrl" class="h-100 w-100"/>
        </div>
        <!-- <v-text-field label="Select Image" @click='pickFile' v-model='imageName' prepend-icon="mdi-file-image"></v-text-field> -->
      
    </label>
</template>

<script>
 
export default {
//   props: ['imageUrl'],
  data: () => ({
    imageUrl: '',
    imageFile: null,
    imageName: 'Sélectionner une image',
  }),
 
  methods: {
    pickFile() {
      this.$refs.image.click()
    },
    onFilePicked(e) {
      const files = e.target.files
      if(files[0] !== undefined) {
        this.imageName = files[0].name
        if (this.imageName.lastIndexOf('.') <= 0) {
          return
        }
        const fr = new FileReader()
        fr.readAsDataURL(files[0])
        fr.addEventListener('load', () => {
          this.imageUrl = fr.result
          this.imageFile = files[0]
        })
      } else {
        this.imageName = ''
        this.imageFile = ''
        this.imageUrl = ''
      }
    },
 
    submitForm() {
        let formData = new FormData()
        formData.append('image_file', this.form.imageFile)
 
        axios.post('/specialties', formData)
          .then(res => {})
          .catch(err => {})
      }
    },
  }
</script>