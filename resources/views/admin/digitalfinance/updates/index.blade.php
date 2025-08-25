@extends('layout.admin')

@section('content')
@include('includes.admin.sidebar')
<main class="dashboard-main">
    @include('includes.admin.appbar')
    @include('includes.main.loading')

    <div class="dashboard-main-body">

                </div>
            </div>
        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Tableau des formulaires -->
        <div class="card">

                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($updates as $update)

                            @endforelse
                        </tbody>
                    </table>
                </div>

</script>
@endsection