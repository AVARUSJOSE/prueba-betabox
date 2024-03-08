<div
    x-data="imagesPicker()"
    x-init="handleInit"
    x-ref="imagesPicker"
    class="images-picker"
>
    <input
        x-ref="inputFile"
        class="images-picker__input"
        type="file"
        name="{{$name ?? 'files'}}[]"
        accept="image/*"
        multiple
        x-on:change="handleChange"
    />

    <div class="images-picker__add-btn" x-on:click="$refs.inputFile.click()">
        <i class="ti-plus"></i>
    </div>

    <template x-for="(image, index) in images">
        <div class="images-picker__image">
            <img x-bind:src="URL.createObjectURL(image)" alt="">
            <button type="button" x-on:click="handleDelete(index)">&times;</button>
        </div>
    </template>

    <template x-for="image in currentImages">
        <div class="images-picker__image">
            <img x-bind:src="image.path" alt="">
            <button type="button" x-on:click="handleDeleteCurrentImg(image)">&times;</button>
        </div>
    </template>
</div>

@once
    @push('scriptsBeforeApp')
        <script>
            const imagesPicker = () => ({
                currentImages: [],
                images: [],
                dataTransfer: new DataTransfer(),
                handleInit() {
                    this.currentImages = @json($currentImages);
                },
                handleChange(e) {
                    for (let file of e.target.files) {
                        this.dataTransfer.items.add(file);
                        this.images.push(file);
                    };

                    e.target.files = this.dataTransfer.files;
                },
                async handleDelete(index) {
                    swal({   
                        title: '¿Está seguro?',
                        text: 'No podrá revertir esta acción',
                        type: 'warning',
                        showCancelButton: true,   
                        confirmButtonColor: '#e6b034',
                        confirmButtonText: 'Si, eliminarla!',
                    }, () => {
                        this.dataTransfer.items.remove(index);
                        this.images.splice(index, 1);
        
                        this.$refs.inputFile.files = this.dataTransfer.files;
                    });
                },
                async handleDeleteCurrentImg(image) {
                    const urlToDelete = @json($urlToDelete);
                    const urlToDeleteIdPlaceholder = @json($urlToDeleteIdPlaceholder);

                    const finalUrl = urlToDelete.replace(urlToDeleteIdPlaceholder, image.id);
                    
                    swal({   
                        title: '¿Está seguro?',
                        text: 'No podrá revertir esta acción',
                        type: 'warning',
                        showCancelButton: true,   
                        confirmButtonColor: '#e6b034',
                        confirmButtonText: 'Si, eliminarla!',
                    }, async () => {
                        await axios.delete(finalUrl);
                        
                        this.currentImages = this.currentImages.filter((_image) => _image.id !== image.id);
                    });
                }
            });
        </script>
    @endpush
@endonce