<!-- Modal -->
<div class="modal fade " id="fileUploadModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog fileUploadModal" role="document">
        <form class="modal-content fileUploadForm" action="{{env('APP_URL')}}">
            @csrf
            <div class="modal-header">
                <div class="left-button d-flex">
                    <div class="button-1">
                        <button class="btn modal-title uploadFileButton button-active" type="button" id="exampleModalLabel1">Profile upload</button>
                    </div>
                    <div class="button-2 ">
                        <button class="btn modal-title takeFileButton" type="button" id="exampleModalLabel1">Take from documents</button>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="file-selection-area d-flex justify-content-center align-content-center">
                    <div class="container d-flex justify-content-center ">
                        <div class="col-md-12 text-center d-flex justify-content-center"
                             style="flex-direction: column; align-items: center">
                            <h2>FILE UPLOAD</h2>
                            <div class="file-drop-area d-block text-center col-md-8">
                                <div class="d-flex justify-content-center image-preview-area"
                                     style="width: 100%; display:none; margin-bottom: 10px">
                                    <img class="imagePreView" src="" alt=""
                                         style="height: 180px; width: 250px; margin: auto;display:none;border-radius: 5px">
                                </div>
                                <div class="drag-text">
                                    <lavel class="choose-file-button" style="font-size: 18px">drag and drop files here
                                    </lavel>
                                    <h4>or</h4>
                                </div>
                                <lavel class="choose-file-button">Choose files</lavel>
                                <input class="file-input" id="avatarFile" name="avatar" type="file"
                                       accept="image/png,image/jpeg,image/gif,image/svg,image/jpg">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="button" class="btn btn-primary fileSubmit">Save changes</button>
            </div>
        </form>
    </div>
</div>
