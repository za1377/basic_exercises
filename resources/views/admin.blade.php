<! Doctype Html>
<html>
    <head>

    </head>
    <body>
        @if($which)
            <div style="display: flex;justify-content: space-around;">
                <p>user_name:</p>
                <p>tittle:</p>
                <p>tittle_id:</p>
                <p>look at tittle</p>
                <p>status:</p>
            </div>
            @foreach($tittles as $tittle)
                @if($tittle->ynAnswer)
                    $value = 'have answer';
                @elseif
                    $value = 'do not have answer';
                @endif
                <div style='display: flex;justify-content: space-around;'>
                    <p>{{$tittle->user_name}}</p>
                    <p>{{$tittle->tittle}}</p>
                    <p>{{$tittle->id}}</p>
                    <form method = 'POST' action ='/show'>
                        @csrf
                        <input type='submit' value='view of tittle' name='submit'>
                        <input type='hidden' value="{{$tittle->id}}" name='id_tittle'>
                    </form>
                    <p>{{$value}}</p>
                    <form method = 'POST' action ='/answer'>
                        @csrf
                        <input type='submit' value='answer' name='submit'>
                        <input type='hidden' value="{{$tittle->id}}" name='id_tittle'>
                    </form>
                </div>
            @endforeach
        @elseif(!$which)
            <form method = 'POST' action ='/update' style="display: flex;flex-direction: column;width: 50%;align-items: baseline;">
                @csrf
                    <label>Your Answer:</label>
                    <input type="text" name="answer" style="margin-bottom: 10px;">
                    <input type='hidden' value="{{$id}}" name='id_tittle'>
                    <input type='submit' value='submit' name='submit'>
            </form>
        @endif
    </body>
</html>