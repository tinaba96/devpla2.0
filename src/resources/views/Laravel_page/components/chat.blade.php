<div class="media flex items-start mb-4 text-sm">
    <div class="flex items-start mb-4 text-sm">
            <img src="{{ $member->users()->first()->profile_image }}" class="w-10 h-10 rounded mr-3">
            <div class="flex-1 overflow-hidden">
                <div>
                    <span class="font-bold">{{ $item->name }}</span>
                    <span class="text-grey text-xs">{{ $item->created_at }}</span>
                </div>
                <p class="text-black leading-normal">
                    {!! nl2br(e($item->chat )) !!}
                </p>
            </div>
    </div>
</div>


