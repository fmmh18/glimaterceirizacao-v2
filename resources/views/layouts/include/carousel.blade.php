<div id="carouselExampleSlidesOnly" class="carousel slide carousel-fade" data-ride="carousel">
    <div class="carousel-inner">
        @php
            $i = 0;
        @endphp
        @foreach ($carousel as  $image)
        <div class="carousel-item @if($i == 0) active @endif">
            <img src="{{ url('storage/'.$image->path) }}"  style="min-height: 500px">
        </div>

        @php
            $i++;
        @endphp
        @endforeach
    </div>
  </div>
