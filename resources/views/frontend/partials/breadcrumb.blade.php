<!--====== PAGE TITLE PART START ======-->
<div class="page-title bg_cover pt-140 pb-140 lazy" @if (!empty($breadcrumb)) data-bg="{{ asset('assets/admin/img/' . $breadcrumb) }}" @endif>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="page-title-item text-center">
                    <h3 class="title">{{ !empty($title) ? $title : '' }}</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            @if(!empty($breadcrumbs))
                                @php 
                                    $breadcrumbCount = count($breadcrumbs);
                                    $start = $breadcrumbCount > 3 ? $breadcrumbCount - 3 : 0;
                                @endphp
                                @for ($i = $start; $i < $breadcrumbCount; $i++)
                                    @if ($i == $breadcrumbCount - 1)
                                        <li class="breadcrumb-item active" aria-current="page">{{ $breadcrumbs[$i]['name'] }}</li>
                                    @else
                                        <li class="breadcrumb-item"><a href="{{ $breadcrumbs[$i]['url'] }}">{{ $breadcrumbs[$i]['name'] }}</a></li>
                                    @endif
                                @endfor
                            @endif
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!--====== PAGE TITLE PART END ======-->
