<! Doctype Html>
<html>
    <head>

    </head>
    <body>
        @if($which)
            <div style="display: flex;justify-content: space-around;margin:20px;">
                <p>tittle:</p>
                <p>ticket:</p>
                <p>answer:</p>
                <p>add new:</p>
            </div>
            @foreach($tittles as $tittle)
                <div style='display: flex;justify-content: space-around;margin:20px;'>
                    <p>{{$tittle->tittle}}</p>
                    <p>{{$tittle->ticket}}</p>
                    <p>{{$tittle->answer}}</p>
                    <form method = 'POST' action ='/insert_tittle'>
                    @csrf
                        <input type='submit' value='Add new' name='submit'>
                    </form>
                </div>;
                
            @endforeach
             
        @elseif(!$which)
            <form method = 'POST' action ='/create' style="display: flex;flex-direction: column;width: 50%;align-items: baseline;">
            @csrf
                <label>Insert tittle name:</label>
                <input type="text" name="tittle_name" style="margin-bottom: 10px;">
                <label>write your ticket:</label>
                <textarea type="text" name="ticket" style="margin-bottom: 10px;"></textarea>
                <label>Your name:</label>
                <input type="text" name="user_name" style="margin-bottom: 10px;">
                <input type='submit' value='submit' name='submit'>
            </form>
        @endif
    </body>
</html>