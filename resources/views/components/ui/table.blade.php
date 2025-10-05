@props([
    'headers' => [],
    'sortableHeaders' => [],
    'sortBy' => null,
    'sortDirection' => 'asc',
    'striped' => true,
    'hover' => true,
    'responsive' => true,
])

<div class="{{ $responsive ? 'overflow-x-auto' : '' }}">
    <table {{ $attributes->merge(['class' => 'min-w-full divide-y divide-gray-200']) }}>
        @if (!empty($headers))
            <thead class="bg-gray-50">
                <tr>
                    @foreach ($headers as $index => $header)
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            @if (isset($sortableHeaders[$index]) && $sortableHeaders[$index])
                                <button wire:click="sortBy('{{ $sortableHeaders[$index] }}')"
                                    class="flex items-center hover:text-gray-700">
                                    {{ $header }}
                                    @if ($sortBy === $sortableHeaders[$index])
                                        <svg class="ml-1 w-4 h-4 {{ $sortDirection === 'asc' ? 'rotate-180' : '' }}"
                                            fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    @endif
                                </button>
                            @else
                                {{ $header }}
                            @endif
                        </th>
                    @endforeach
                </tr>
            </thead>
        @elseif(isset($header))
            <thead class="bg-gray-50">
                {{ $header }}
            </thead>
        @endif

        <tbody class="bg-white divide-y divide-gray-200 {{ $striped ? '' : 'divide-y-0' }}">
            {{ $slot }}
        </tbody>

        @isset($footer)
            <tfoot class="bg-gray-50">
                {{ $footer }}
            </tfoot>
        @endisset
    </table>
</div>

<style>
    @if ($hover)
        tbody tr:hover {
            background-color: #f9fafb;
        }
    @endif

    @if ($striped)
        tbody tr:nth-child(even) {
            background-color: #f8fafc;
        }
    @endif
</style>
