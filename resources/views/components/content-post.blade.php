<div class="content-post">
    <div class="box margin-down-small pos-relative">
        <div class="row items-flex margin-down-small">
            <div class="col items-flex align-center w50">
                <figure class="img-user-default margin-right-small items-flex align-center">
                    <?php $image = $user->image ?? old('image') ?>
                    <img src="{{ url("storage/{$image}") }}" />
                </figure>
                <div class="margin-left-small">
                    <h6>{{ $user->name ?? old('name') }}</h6>
                    <p class="small">{{$post->created_at ?? old('created_at') }}</p>
                </div>
            </div>
            <div class="col items-flex align-center just-end w50">
                <a href="{{ route('profile', $user->id) }}" class="button bgBlackWeakIn"><i class="ri-eye-line"></i></a>
            </div>
        </div>
        <div class="row">
            <h5 class="margin-down-small-in">{{ $post->title ?? old('title') }}</h5>
            <p class="description">{{$post->content ?? old('content') }}</p>
            <figure class="content-figure img-post-default margin-top-small text-center">
                <?php $imagePost = $post->image ?? old('image') ?>
                <img src="{{ url("storage/{$imagePost}") }}" />
            </figure>
        </div>
        <div class="row margin-top-small">
            <ul class="col items-flex align-center">
                <li class="message action-post margin-right-default">
                    <button class="accordion"><i class="ri-message-3-line"></i> <span>Comentar</span></button>
                    <form  method="post" action="{{ route('comments-store') }}" class="w100 message-content accordion-content items-flex align-center just-space-between margin-down-small">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Session::get('id') }}" />
                        <input type="hidden" name="post_id" value="{{ $post->id }}" />
                        <input type="text" name="comment" class="bgBlackWeakIn w90" placeholder="Seu comentário" />
                        <button type="send" class="bgBlackWeakIn"><i class="ri-send-plane-line"></i></button>
                    </form>
                </li>
                <li class="message action-comments">
                    <button class="accordion"><i class="ri-eye-line"></i><span>See comments</span></button>
                    <div class="see-comments accordion-content box margin-down-small">
                        <ul class="w100">
                            <?php 
                                foreach ($comments as $comment){
                                    foreach($users as $user){
                                        if($post->id == $comment->post_id)
                                        if($comment->user_id == $user->id){
                                            $user = DB::select('select * from users where id = :id', ['id' => $comment->user_id]);
                                            $user = $user[0];
                            ?>
                                <li class="margin-down-small margin-top-small">
                                    <a href="{{ route('profile', $user->id) }}" class="items-flex align-center">
                                        <figure class="img-user-small margin-right-small">
                                            <img src="{{ url("storage/{$user->image}") }}" /> 
                                        </figure>
                                        <p>{{ $comment->comment }}</p>
                                    </a>
                                </li>
                            <?php }}} ?>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>

