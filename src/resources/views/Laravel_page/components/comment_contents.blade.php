<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
@foreach ($post->comments as $comment)
	<div class="flex items-center space-x-2">
		<div class="group relative flex flex-shrink-0 self-start cursor-pointer">
			<img x-on:mouseover="open1 = true" x-on:mouseleave="open1 = false" src="{{ optional($comment->user()->first())->profile_image}}" alt="" class="h-8 w-8 object-fill rounded-full">
			<div class="flex items-center justify-center space-x-2">
				<div class="block">
					<div class="flex justify-center items-center space-x-2">
						<div class="bg-gray-100 w-auto rounded-xl px-2 pb-2">
							<div class="font-medium">
								<a href="#" class="hover:underline text-sm">
									<small>{{ optional($comment->user()->first())->name }}</small>
								</a>
							</div>
							<div class="text-xs">{!! nl2br(e($comment->body)) !!}</div>
						</div>
						<div class="self-stretch flex justify-center items-center transform transition-opacity duration-200 opacity-0 hover:opacity-100">
							<a href="#" class="">
								<div class="text-xs cursor-pointer flex h-6 w-6 transform transition-colors duration-200 hover:bg-gray-100 rounded-full items-center justify-center">
									<svg class="w-4 h-6" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z">
										</path>
									</svg>
								</div>
							</a>
						</div>
					</div>
					<div class="flex justify-start items-center text-xs w-full">
						<div class="font-semibold text-gray-700 px-2 flex items-center justify-center space-x-1">
							<a href="#" class="hover:underline">
								<small>{{ $comment->created_at->format('Y.m.d H:i') }}</small>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endforeach


