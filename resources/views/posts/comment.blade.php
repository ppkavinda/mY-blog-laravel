<blockquote class="blockquote">
  <p class="mb-0"> <strong>{{ $comment->user->name }}:&nbsp;</strong>{{ $comment->body }}</p>
  <footer class="blockquote-footer"> <small>{{ $comment->created_at->diffForHumans() }}</small></footer>
</blockquote>
	
