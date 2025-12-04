{{-- Vehicle Card Component --}}
<div class="park-car-box">
  <img src="@asset('images/cars/car-{{ $volume }}.png')" alt="{{ $name }}" class="park-car-main-image" @if($volume === '8') width="638px" @endif>
  <div class="park-car-body">
    <div class="park-car-body-desc">
      <h3 class="park-car-body-desc__headline">{{ $name }}</h3>
      <div class="park-car-body-desc__group">
        <p>Размер (В х Ш х Д)</p>
        <h3>{{ $dimensions }}</h3>
      </div>
      <div class="park-car-body-desc__group">
        <span class="caption">Объем</span>
        <p>{{ $volume }} м3</p>
      </div>
      <div class="park-car-body-desc__group">
        <span class="caption">Вместимость</span>
        <p>{{ $capacity }}</p>
      </div>
    </div>
    <img src="@asset('images/cars/pallete-{{ $volume }}.png')" alt="" class="park-car-body-image">
    <img src="@asset('images/cars/pallete-{{ $volume }}-nb.png')" alt="" class="park-car-body-image-nb">
    <img src="@asset('images/cars/pallete-{{ $volume }}-t.png')" alt="" class="park-car-body-image-t @if($volume === '82') fura-fix @endif">
  </div>
</div> 