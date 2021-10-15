<template>
    <div class="container">
        <file-pond
            name="image"
            ref="image"
            label-idle="Выбрать фото..."
            v-bind:allow-multiple="false"
            accepted-file-types="image/jpeg"
            :server="server"
            v-bind:files="gal_filepond_files"
        />
        <button @click="saveGal()" class="btn btn-primary">Сохранить</button>
    </div>
</template>

<script>
    import vueFilePond from "vue-filepond";

    import "filepond/dist/filepond.min.css";

    import "filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css";
    
    import FilePondPluginFileValidateType from "filepond-plugin-file-validate-type";
    import FilePondPluginImagePreview from "filepond-plugin-image-preview";
    
    const FilePond = vueFilePond(
        FilePondPluginFileValidateType,
        FilePondPluginImagePreview
    );

export default {
    data() {
        return {
            name: '',
            image: '',
            gal_filepond_files: [],
            server: {
                remove(filename, load) {
                    load('1');
                },
                process(fieldName, file, metadata, load, error, progress, abort, transfer, options) {
                    const formData = new FormData();
                    formData.append(fieldName, file, file.name);
                    const request = new XMLHttpRequest();
                    request.open('POST', '/api/admin/gallery/add_image_upload');
                    request.upload.onprogress = (e) => {
                        progress(e.lengthComputable, e.loaded, e.total);
                    };
                    request.onload = function () {
                        if (request.status >= 200 && request.status < 300) {
                            load(request.responseText);
                        } else {
                            error('oh no');
                        }
                    };
                    request.send(formData);
                    return {
                        abort: () => {
                            request.abort();
                            abort();
                        },
                    };
                },
                load(source, load, error, progress, abort, headers) {
                    var myRequest = new Request(source);
                    fetch(myRequest).then(function(response) {
                        response.blob().then(function(myBlob) {
                            load(myBlob)
                        });
                    });
                },
            },
        }
    },
    created() {
        this.$parent.subheader = 'Новое фото в галерею'
    },
    methods: {
        saveGal() {
            this.image = document.getElementsByName("image")[0].value
            if(this.image) {
                axios
                .post(`/api/admin/gallery`, { image: this.image })
                .then(response => (
                    this.$router.push({name: 'AdminGallery'})
                ))
                .catch((error) => {
                    if(error.response) {
                        for(var key in error.response.data.errors){
                            console.log(key)
                        }
                    }
                });
            } else {
                alert('Загрузите файл')
            }
        },
    },
    components: {
        FilePond,
    }
}
</script>
