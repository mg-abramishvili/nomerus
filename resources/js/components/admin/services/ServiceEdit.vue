<template>
    <div class="w-100">
        <label class="form-label mb-1">Название</label>
        <input v-model="name" type="text" class="form-control mb-3" placeholder="Название">
        
        <label class="form-label mb-1">Текст</label>
        <textarea v-model="text" class="form-control mb-3"></textarea>

        <file-pond
            name="image"
            ref="image"
            label-idle="Выбрать картинку..."
            v-bind:allow-multiple="false"
            accepted-file-types="image/jpeg, image/png"
            :server="server"
            v-bind:files="filepond_files_edit"
        />
        <button @click="updateService(service.id)" class="btn btn-danger">Сохранить</button>
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
            service: {},

            name: '',
            text: '',
            image: '',

            filepond_files: [],
            filepond_files_edit: [
                {
                    source: '1',
                    options: {
                        type: 'local',
                    }
                }
            ],
            server: {
                remove(filename, load) {
                    load('1');
                },
                process(fieldName, file, metadata, load, error, progress, abort, transfer, options) {
                    const formData = new FormData();
                    formData.append(fieldName, file, file.name);
                    const request = new XMLHttpRequest();
                    request.open('POST', '/api/admin/services/add_image_upload');
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
        axios
            .get(`/api/admin/service/${this.$route.params.id}`)
            .then(response => (
                this.service = response.data,
                this.$parent.subheader = this.service.name,
                this.name = response.data.name,
                this.text = response.data.text,
                this.filepond_files_edit = [
                    {
                        source: response.data.image,
                        options: {
                            type: 'local',
                        }
                    }
                ]
            ))
    },
    methods: {
        updateService(id) {
            this.image = document.getElementsByName("image")[0].value
            if(this.name.length && this.image) {
                axios
                .post(`/api/admin/service/${id}`, { name: this.name, text: this.text, image: this.image })
                .then(response => (
                    this.$router.push({name: 'AdminServices'})
                ))
                .catch((error) => {
                    if(error.response) {
                        for(var key in error.response.data.errors){
                            console.log(key)
                            alert(key)
                        }
                    }
                });
            } else {
                alert('Заполните поля')
            }
        },
    },
    components: {
        FilePond,
    }
}
</script>