@extends('layouts.guest')

@section('content')
    <h1>Dodaj zdjęcia / wideo</h1>
    <h2>{{ $name }}</h2>

    <form method="POST">
        @csrf
        <input type="file" name="file" placeholder="Upload" multiple>
        <button type="submit">Wgraj</button>
    </form>

    <script>
        export function upload(file, options) {
            const xhr = new XMLHttpRequest();
            const tokenLS = localStorage.getItem('token');
            const token = tokenLS || '';

            xhr.open('POST', options.url, true);
            xhr.setRequestHeader('Authorization', 'Bearer ' + token);
            xhr.setRequestHeader('Accept', 'application/json');
            xhr.responseType = 'json';

            if (options.onError) {
                xhr.addEventListener('error', options.onError);
            }

            if (options.onAbort) {
                xhr.addEventListener('abort', options.onAbort);
            }

            if (options.onLoad) {
                xhr.addEventListener('load', ev => {
                    const target = ev.currentTarget;
                    if (target.status < 400) {
                        options.onLoad?.(ev)
                    } else {
                        options.onError?.(ev)
                    }
                });
            }

            if (options.onLoadStart) {
                xhr.addEventListener('loadstart', options.onLoadStart);
            }

            if (options.onLoadEnd) {
                xhr.addEventListener('loadend', ev => {
                    const target = ev.currentTarget;
                    if (target.status < 400) {
                        options.onLoadEnd?.(ev)
                    } else {
                        options.onError?.(ev)
                    }
                });
            }

            if (options.onTimeout) {
                xhr.addEventListener('timeout', options.onTimeout);
            }

            if (xhr.upload && options.onProgress) {
                xhr.upload.addEventListener('progress', options.onProgress);
            }

            const data = new FormData();
            data.append('file', file);

            if (options.data && Object.keys(options.data).length > 0) {
                for (const key in options.data) {
                    if (options.data.hasOwnProperty(key)) {
                        data.append(key, options.data[key]);
                    }
                }
            }

            xhr.send(data);

            return xhr;
        }
    </script>
@endsection
