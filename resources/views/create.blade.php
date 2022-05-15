@extends('layout')
@section('content')
    <div class="container">
        <div class="col-lg-6 mx-auto py-5">
            <div class="card shadow">
                <div class="card-header">
                    <h4>Добавить студента</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('students.store')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="mb-2">ФИО студента</label>
                            <input type="text" class="form-control" name="fullname" required>
                        </div>

                        <div class="mb-3">
                            <label class="mb-2">Email</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>


                        <div class="mb-3">
                            <label class="mb-2">Дата рождения</label>
                            <input type="date" class="form-control" name="birthdate" required>
                        </div>
                        <hr>
                        <h6>Адрес проживания:</h6>
                        <div class="mb-3">
                            <label class="mb-2">Область:</label>
                            <v-select :options="{{$regions->toJson()}}"
                                      label="name"
                                      @input="onRegionSelect">
                            </v-select>
                        </div>
                        <div class="mb-3">
                            <label class="mb-2">Район:</label>
                            <v-select :options="districts"
                                      label="name"
                                      @input="onDistrictSelect">
                            </v-select>
                        </div>

                        <div class="mb-3">
                            <label class="mb-2">Посёлок:</label>
                            <v-select :options="towns"
                                      label="name"
                                      v-model="townCode"
                                      :reduce="town => town.id">
                            </v-select>

                            <input type="hidden" name="town_id" :value="townCode">
                        </div>

                        <a href="{{route('students.index')}}" class="btn btn-secondary float-start">Отмена</a>
                        <button type="submit" class="btn btn-primary float-end">Добавить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js"
            integrity="sha512-odNmoc1XJy5x1TMVMdC7EMs3IVdItLPlCeL5vSUPN2llYKMJ2eByTTAIiiuqLg+GdNr9hF6z81p27DArRFKT7A=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        Vue.component('v-select', VueSelect.VueSelect);

        new Vue({
            el: '#app',
            data: {
                townCode: '',
                districts: [],
                towns: []
            },

            methods: {
                onRegionSelect(val) {
                    let self = this;
                    axios.get(`/api/regions/${val.code}/districts`)
                        .then((response) => {
                            self.districts = response.data;
                        });
                },

                onDistrictSelect(val) {
                    let self = this;
                    axios.get(`/api/districts/${val.code}/towns`)
                        .then((response) => {
                            self.towns = response.data;
                        });
                },
            }
        })

    </script>
@endsection