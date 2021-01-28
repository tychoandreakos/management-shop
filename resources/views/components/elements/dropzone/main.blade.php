<div class="form-group">
    <h6>Upload Items Image</h6>
    <label for="input-file-now">
        <small class="text-right">*Max image upload: 5MB</small>
    </label>
    <div id="dropzone" class="fallback dropzone">
        <input hidden name="file" type="file" multiple/>
    </div>
</div>
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/dropzone-master/dist/dropzone.css')  }}">
@endpush

@push('scripts')
    <script src="{{ asset("assets/plugins/dropzone-master/dist/dropzone.js")  }}"></script>
    <script src="{{ asset("assets/plugins/styleswitcher/jQuery.style.switcher.js")  }}"></script>
    <script>
        Dropzone.autoDiscover = false;
        $(document).ready(function () {
            $('#dropzone').dropzone({
                url: '{{ route('items.store_image')  }}',
                maxFilesize: 12,
                acceptedFiles: ".jpeg,.jpg,.png,.gif",
                addRemoveLinks: true,
                headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
                timeout: 5000,
                removedFile: function () {
                    console.log('sau')
                },
                init: function () {
                    @if(isset($item))
                    @foreach($item->itemImageTransaction as $imageTransaction)
                    @php
                        $image = $imageTransaction->itemImage->image;
                        $extension = explode(".", $image);
                        $imagePath = \Illuminate\Support\Facades\Storage::disk('admin_items');
                        $sizeFile = $imagePath->size($image);
                    @endphp
                    var mockFile = {
                        name: `{{$image}}`,
                        size: `{{ $sizeFile  }}`,
                        type: `image/{{ $extension[count($extension) - 1] }}`
                    }


                    this.files.push(mockFile)
                    this.emit("addedfile", mockFile);
                    this.emit("thumbnail", mockFile, `{{ $imagePath->url($image)  }}`);
                    this.emit("complete", mockFile);
                    @endforeach
                    @endif
                },
                success: function (file, response) {
                    console.log(response);
                },
                error: function (file, response) {
                    return false;
                }
            });
            $('.dz-remove').click(function (e) {
                e.preventDefault();
                e.stopPropagation();

                const name = $(this).parent().find(".dz-filename > span").text();
                $.ajax({
                    url: `{{ route('items.destroyImage')  }}`,
                    data: {
                        name,
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    },
                    type: 'POST',
                    success: function () {
                        console.log('success!')
                    },
                    error: function () {
                        console.error('failed!');
                    }
                })
            })
        })
    </script>
@endpush
