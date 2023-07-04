@if(session('flash'))
<div class="flash position-relative">
        <div class="alert alert-{{session('flash')['class']}} alert-dismissible position-absolute w-50"
             style="display: none; top: 5%;left: 50%;-webkit-transform: translateX(-50%);transform: translateX(-50%)">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <p class="mb-0">{{ session('flash')['message'] }}</p>
        </div>
</div>
@endif
