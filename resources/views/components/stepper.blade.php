<div class="flex items-center">
    @foreach ($steps as $step)
        <div class="flex items-center">
            <div class="h-2 w-2 rounded-full @if ($currentStep >= $step['number']) bg-blue-500 @else bg-gray-200 @endif"></div>
            @if ($loop->last)
                <div class="ml-2 text-sm font-medium text-gray-500">{{ $step['label'] }}</div>
            @else
                <div class="ml-2 text-sm font-medium text-blue-500">{{ $step['label'] }}</div>
            @endif
        </div>
        @unless ($loop->last)
            <div class="flex-shrink-0 w-6 border-t-2 border-gray-200"></div>
        @endunless
    @endforeach
</div>
