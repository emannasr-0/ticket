<ul>
    {{-- @dd(count($messages)) --}}
    @if(count($messages) > 0)
        @foreach($messages as $message)
        @if(!empty($message['statusString']))
            @if($message['statusString'] == 'SENT')
                <li class="left" style="border-radius: 35px; margin-bottom: 5px; padding: 10px;">
                    @if(!empty($message['text']) || !empty($message['finalText']) )
                    {!! nl2br(e($message['text'] ?? $message['finalText'] )) !!}
                    @endif
                </li>
            @else
                <li class="right" style="border-radius: 35px; margin-bottom: 5px; padding: 10px;">
                   @if(!empty($message['text']) || !empty($message['finalText']))
                    {!! nl2br(e($message['text'] ?? $message['finalText'] )) !!}
                    @endif
                </li>
            @endif
        @endif
        @endforeach
    @else
        <li>No Message Found..!</li>
    @endif
</ul>