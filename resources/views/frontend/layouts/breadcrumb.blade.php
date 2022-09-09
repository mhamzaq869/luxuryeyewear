<div class="brand_banner">
    <div class="container">
      <div class="brand_banner_content">
        <div class="brand_banner_content_text text-center">
          <h1 class="brand_bannner_head">@yield('title')</h1>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumbStyle justify-content-center">
              <li class="breadcrumb-item"><a href=" {{url('/')}}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>