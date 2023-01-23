<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    @if(isset($li_1))
                    <li class="breadcrumb-item">
                        <a href="{{ $li_1_link }}">{{ $li_1 }}</a>
                    </li>
                    @endif
                    @if(isset($li_2))
                    <li class="breadcrumb-item">
                        <a href="{{ $li_2_link }}">{{ $li_2 }}</a>
                    </li>
                    @endif
                    <li class="breadcrumb-item active">{{ $page_now }}</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->
