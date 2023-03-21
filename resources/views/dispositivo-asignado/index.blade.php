@extends('layouts.app')

@section('template_title')
    Dispositivo Asignado
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Dispositivo Asignado') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('dispositivo-asignados.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>Modelo</th>
                                        <th>Activo</th>
										<th>Tipo&nbspDispositivo</th>
										<th>Serial</th>
										<th>Cod&nbspPDV</th>
                                        <th>Nombre&nbspPdv</th>
										<th>Estado</th>
										<th>Numero&nbspActa</th>
                                        <th>Procesador</th>
                                        <th>Ram</th>
                                        <th>Disco&nbspDuro</th>
										<th>Mac</th>
										<th>Imei</th>
                                        <th>Cantidad</th>



                                        <th>User&nbspAsignado</th>
										<th>Observacion</th>
										<th>Modificado&nbspPor</th>
										<th>Ultima&nbspmodificacion</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                    @foreach ($dispositivos as $dispositivo)
                                    @foreach ($users[$dispositivo->id_userCreador=$dispositivo->id_userCreador-1] as $user)

                                        <tr>
                                            <td>{{ $dispositivo->modelo }}</td>
											<td>{{ $dispositivo->id }}</td>
											<td>{{ $dispositivo->tipoDispositivo }}</td>
											<td>{{ $dispositivo->serial }}</td>
											<td>{{ $dispositivo->id_puntoVenta }}</td>
											<td>{{ $dispositivo->nombrePdv }}</td>
											<td>{{ $dispositivo->estado }}</td>
											<td>{{ $dispositivo->numeroActa }}</td>
                                            <td>{{ $dispositivo->procesador }}</td>
                                            <td>{{ $dispositivo->ram }}</td>
                                            <td>{{ $dispositivo->discoDuro }}</td>
											<td>{{ $dispositivo->mac }}</td>
											<td>{{ $dispositivo->imei }}</td>
                                            <td>{{ $dispositivo->cantidad }}</td>

                                            <td>{{ $dispositivo->name }}</td>
											<td>{{ $dispositivo->observacion }}</td>

                                            <td>{{ $user }}</td>


                                            <td>{{ $dispositivo->updated_at }}</td>

                                            <td>
                                                <form class="eliminar" action="{{ route('dispositivos.destroy',$dispositivo->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary" href="{{ route('dispositivos.edit',$dispositivo->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @if(@Auth::user()->hasRole('inventario'))
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                    @endif
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $dispositivoAsignados->links() !!}
            </div>
        </div>
    </div>
@endsection
