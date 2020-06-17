@extends ('admin.layout')

@section('content')

<section class="content">

    <div class="row">

        <div class="col-md-3">
            <div class="info-box">
                <span class="info-box-icon btn-outline-primary"><i class="fas fa-map-marked-alt"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Lugares</span>
                    <span class="info-box-number">{{ $posts->count() }}</span>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="info-box">
                <span class="info-box-icon btn-outline-danger"><i class="fas fa-comments"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Comentarios</span>
                    <span class="info-box-number">{{ $comments->count() }}</span>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="info-box">
                <span class="info-box-icon btn-outline-success"><i class="fas fa-running"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Actividades</span>
                    <span class="info-box-number">{{ $tags->count() }}</span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="info-box">
                <span class="info-box-icon btn-outline-warning"><i class="fas fa-users"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Usuarios</span>
                    <span class="info-box-number">{{ $users->count() }}</span>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-8">
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
                google.charts.load('current', {
                    'packages': ['bar']
                });
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                        ['Mes', 'Cantidad'],
                        ['Ene', {{ $ene[0]->cantidad }} ],
                        ['Feb', {{ $feb[0]->cantidad }}],
                        ['Mar', {{ $mar[0]->cantidad }}],
                        ['Abr', {{ $abr[0]->cantidad }}],
                        ['May', {{ $may[0]->cantidad }}],
                        ['Jun', {{ $jun[0]->cantidad }}],
                        ['Jul', {{ $jul[0]->cantidad }}],
                        ['Ago', {{ $ago[0]->cantidad }}],
                        ['Sep', {{ $sep[0]->cantidad }}],
                        ['Oct', {{ $oct[0]->cantidad }}],
                        ['Nov', {{ $nov[0]->cantidad }}],
                        ['Dic', {{ $dic[0]->cantidad }}]

                    ]);

                    var options = {
                        bars: 'vertical' // Required for Material Bar Charts.
                    };

                    var chart = new google.charts.Bar(document.getElementById('barchart_material'));

                    chart.draw(data, google.charts.Bar.convertOptions(options));
                }
            </script>

            <div class="card shadow p-3 mb-5 bg-white rounded border-top border-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="far fa-chart-bar"></i>
                        Comentarios
                    </h3>
                </div>
                <div class="card-body">
                    <div id="barchart_material" style="height: 300px;"></div>
                </div>
                <!-- /.card-body-->
            </div>
        </div>

        <div class="col-4">
        <div class="card shadow p-3 mb-5 bg-white rounded border-top border-primary" style="height: 421px; overflow: scroll;" >
              <div class="card-header">
                <h3 class="card-title">
                <i class="far fa-chart-bar"></i>
                Ranking de Lugares</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                @foreach ($posts as $post)
                  <li class="item">
                    <div class="product-img ">
                      <img src="/images/{{ $post->urlimg }}" alt="Product Image" class="img-size-50 rounded">
                    </div>
                    <div class="product-info">
                      <a href="javascript:void(0)" class="product-title">{{ $post->title }}
                        <span class="badge badge-warning float-right">{{ $post->point }} </span></a>
                      <span class="product-description">
                      {{ $post->excerpt }}
                      </span>
                    </div>
                  </li>
                  @endforeach
                  <!-- /.item -->
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
        </div>
    </div>
</section>



@stop