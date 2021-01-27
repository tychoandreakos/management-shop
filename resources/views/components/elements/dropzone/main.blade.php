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
                url: 'upload.php',
                maxFilesize: 12,
                acceptedFiles: ".jpeg,.jpg,.png,.gif",
                addRemoveLinks: true,
                timeout: 5000,
                success: function (file, response) {
                    console.log(response);
                },
                error: function (file, response) {
                    return false;
                }
            });
        })
    </script>
@endpush
