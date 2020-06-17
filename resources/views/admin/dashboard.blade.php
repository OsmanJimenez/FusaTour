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
                google.charts.load('current', {'packages':['corechart']});
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                        ['Mes', 'Cantidad'],
                                    ['Ene', {{ $ene_2[0]->cantidad }} ],
                                    ['Feb', {{ $feb_2[0]->cantidad }}],
                                    ['Mar', {{ $mar_2[0]->cantidad }}],
                                    ['Abr', {{ $abr_2[0]->cantidad }}],
                                    ['May', {{ $may_2[0]->cantidad }}],
                                    ['Jun', {{ $jun_2[0]->cantidad }}],
                                    ['Jul', {{ $jul_2[0]->cantidad }}],
                                    ['Ago', {{ $ago_2[0]->cantidad }}],
                                    ['Sep', {{ $sep_2[0]->cantidad }}],
                                    ['Oct', {{ $oct_2[0]->cantidad }}],
                                    ['Nov', {{ $nov_2[0]->cantidad }}],
                                    ['Dic', {{ $dic_2[0]->cantidad }}]
                    ]);

                    var options = {
                    curveType: 'function',
                    legend: { position: 'right' }
                    };

                    var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

                    chart.draw(data, options);
                }
            </script>

                <div class="card shadow p-3 mb-5 bg-white rounded border-top border-primary">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="far fa-chart-bar"></i>
                            Usuarios Registrados
                        </h3>
                    </div>
                    <div class="card-body">
                        <div id="curve_chart" style="width: 100%; height: 300px"></div>

                    </div>
                    <!-- /.card-body-->
                </div>
        </div>

        <div class="col-4">
        <div class="card shadow p-3 mb-5 bg-white rounded border-top border-primary" style="height: 421px; overflow: scroll; overflow-x: hidden;" >
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
                            <span class="badge badge-warning float-right">{{ $post->point }} </span>
                        </a>
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

    <div class="row">
    <div class="col-4">
    <!-- DIRECT CHAT -->
                <div class="card direct-chat direct-chat-primary border-top border-primary shadow rounded">
                  <div class="card-header">
                    <h3 class="card-title">Ultimos Comentarios</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <!-- Conversations are loaded here -->
                    <div class="direct-chat-messages" style="height: 367px;">
@foreach($comments as $comment)
                      <!-- Message to the right -->
                      <div class="direct-chat-msg ">
                        <div class="direct-chat-infos clearfix">
                          <span class="direct-chat-name float-right">{{ $comment->post->title }}</span>
                          <span class="direct-chat-timestamp float-left">{{ $comment->user->name }}</span>
                        </div>
                        <!-- /.direct-chat-infos -->
                        <img class="direct-chat-img" src="/images/{{ $comment->user->avatar }}" alt="message user image">
                        <!-- /.direct-chat-img -->
                        <div class="direct-chat-text">
                        {{ $comment->text }}
                        </div>
                        <!-- /.direct-chat-text -->
                      </div>
                      <!-- /.direct-chat-msg -->
                      @endforeach
                    </div>
                    <!--/.direct-chat-messages-->

                    
                  </div>
                  <!-- /.card-body -->
                </div>
                <!--/.direct-chat -->
        </div>

        <div class="col-8">
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
                        Comentarios Publicados
                    </h3>
                </div>
                <div class="card-body">
                    <div id="barchart_material" style="height: 300px;"></div>
                </div>
                <!-- /.card-body-->
            </div>
        </div>
    </div>

    
</section>



@stop