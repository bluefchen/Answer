@if($useranswer[$questionids[$i+1]]==$questions[$i]['answer'])
<h4>第{{$i+1}}题： 答对</h4>
@elseif($useranswer[$questionids[$i+1]]==NULL)
<h4 class="text-danger">第{{$i+1}}题：未答</h4>
@else
<h4 class="text-danger">第{{$i+1}}题：答错</h4>
@endif
<p><strong>题目：&nbsp;&nbsp;</strong>{!! nl2br($questions[$i]['title'])!!}</p>
<p><strong>A: &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;</strong>{!! nl2br($questions[$i]['optionA']) !!}
</p>
<p><strong>B: &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;</strong>{!! nl2br($questions[$i]['optionB']) !!}
</p>
<p><strong>C: &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;</strong>{!! nl2br($questions[$i]['optionC']) !!}
</p>
<p><strong>D: &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;</strong>{!! nl2br($questions[$i]['optionD']) !!}
</p>
<p class="text-danger"><strong>正确答案: &nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;</strong>{!! nl2br($questions[$i]['answer']) !!}</p>
@if($useranswer[$questionids[$i+1]]!=NULL&&$useranswer[$questionids[$i+1]]!=$questions[$i]['answer'])
<p><strong>您的答案: &nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;</strong>{!! nl2br($useranswer[$questionids[$i+1]]) !!}</p>
@endif
<p><strong>解析: &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;</strong>{!!  nl2br($questions[$i]['parse']) !!}
</p>