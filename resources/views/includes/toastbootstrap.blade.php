@php
  $type = [
    "success" => "bg-success",
    "error" => "bg-danger",
    "warning" => "bg-warning"
  ]


@endphp
@if ( session()->has('toast-bootstrap') && $toast = session()->get('toast-bootstrap'))


<div
id="toast-ex"
class="bs-toast toast toast-ex animate__bounce my-2"
role="alert"
aria-live="assertive"
aria-atomic="true"
data-bs-delay="2000"
>
<div class="toast-header {{ $type[$toast['type'] ?? 'success'] }}">
  <div class="me-auto fw-semibold">{{  $toast['title'] ?? '' }}</div>
  <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
</div>
<div class="toast-body text-wrap h-6 fs-6" style="width: 20rem;">{{ $toast['message'] ?? '' }}</div>
</div>


<script>

    const toastAnimationExample = document.getElementById('toast-ex');
    toastAnimation = new bootstrap.Toast(toastAnimationExample);
    toastAnimation.show();
    console.log(toastAnimation);

</script>
@endif

