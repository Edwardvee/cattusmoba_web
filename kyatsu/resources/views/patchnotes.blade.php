@extends('maintemplate')

@section('http_headers')
    <title>Kyatsu! - Reglas</title>
    <link rel="stylesheet" href="{{url('css/patchnotes.css')}}">
@endsection
@section('http_body')

    <body>
        <br><br><br><br>
        <div class="container-fluid">
           
            <div class="row row-cols-2">
                <div class="col col-12 col-md-6" id="dev_holder">
                    <h3>Dev updates</h3>
                </div>
                <div class="col col-12 col-md-6" id="release_holder"><h3>Releases updates</h3></div>
            </div>


        </div>

        <script>
            let ouput_url = "{{ url('py/output.txt') }}";
            fetch(ouput_url)
                .then(response =>
                    response.text())
                .then(data => {console.log("vama"); 
                    document.getElementById("dev_holder").innerHTML += data})
                .catch(err => console.log("velga")) 

                let ouput2_url = "{{ url('py/output2.txt') }}";
            fetch(ouput2_url)
                .then(response =>
                    response.text())
                .then(data => {console.log("vama parte 2"); 
                    document.getElementById("release_holder").innerHTML += data})
                .catch(err => console.log("velga la secuela")) 

                
        </script>

    </body>
@endsection("http_body")
