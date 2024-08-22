<footer class="footer-section bg-lighter pt-100"
  style="background:#{{ $footerInfo ? $footerInfo->footer_background_color : '' }}">
  <div class="container">
    <div class="row justify-content-between" style="text-align: center">
      <div class="col-lg-12 col-sm-12">
        <div class="footer-widget about-widget">
          <div class="footer-logo mb-30">
            @if (!is_null($footerInfo))
              <a href="{{ route('index') }}"><img
                  src="{{ asset('assets/admin/img/footer_logo/' . $footerInfo->footer_logo) }}" alt="Logo" style="width: 250px"></a>
            @endif
          </div>
          <p>{!! $footerInfo ? $footerInfo->about_company : '' !!}</p>
          <div class="social-style-one mt-30 d-flex justify-content-center" style="margin-bottom: 50px">
            @if (count($socialMediaInfos) > 0)
              @foreach ($socialMediaInfos as $socialMediaInfo)
                <a href="{{ $socialMediaInfo->url }}"><i class="{{ $socialMediaInfo->icon }}"></i></a>
              @endforeach
            @endif
          </div>
          <div class="">
            @php
              $date = Date('Y');
              if (!empty($footerInfo->copyright_text)) {
                  $footer_text = str_replace('{year}', $date, $footerInfo->copyright_text);
              }
            @endphp
            <hr style="border-color: #f8cabd">
            <p>{!! !empty($footerInfo->copyright_text) ? $footer_text : '' !!}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
