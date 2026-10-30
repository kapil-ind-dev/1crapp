@php
    $selfAllowed = isset($allowedModuleIds[$module->id]);
    $children = $module->childrenRecursive ?? collect();
    $hasChildren = $children->isNotEmpty();

    if (!$hasChildren) {
        $status = $selfAllowed ? 'yes' : 'no';
    } else {
        // Recursive counter function passing $allowedModuleIds via 'use'
        $scanTree = function ($items) use (&$scanTree, $allowedModuleIds) {
            $total = 0;
            $allowed = 0;

            foreach ($items as $item) {
                $total++;
                if (isset($allowedModuleIds[$item->id])) {
                    $allowed++;
                }

                if ($item->childrenRecursive && $item->childrenRecursive->isNotEmpty()) {
                    $res = $scanTree($item->childrenRecursive);
                    $total += $res['total'];
                    $allowed += $res['allowed'];
                }
            }

            return ['total' => $total, 'allowed' => $allowed];
        };

        $treeStats = $scanTree($children);
        $totalItems = $treeStats['total'] + 1; // All sub-children + current module
        $allowedItems = $treeStats['allowed'] + ($selfAllowed ? 1 : 0);

        if ($allowedItems === $totalItems) {
            $status = 'yes';
        } elseif ($allowedItems > 0) {
            $status = 'partial';
        } else {
            $status = 'no';
        }
    }

    $nodeId = 'mod-' . $module->id . '-' . \Illuminate\Support\Str::random(6);
@endphp

<li class="module-node">
    <div class="module-line">
        {{-- Status badge --}}
        <span class="module-check {{ $status }}">
            @if($status === 'yes')
                &#10003;
            @elseif($status === 'partial')
                &#8722;
            @else
                &#10005;
            @endif
        </span>

        <span class="module-label {{ $status === 'no' ? 'not-included' : '' }} {{ $status === 'partial' ? 'partially-included' : '' }}">
            {{ $module->name }}
        </span>

        @if($hasChildren)
            <button type="button"
                    class="module-toggle"
                    aria-expanded="false"
                    aria-controls="{{ $nodeId }}"
                    aria-label="Toggle {{ $module->name }}">
                <span class="chevron">&#8250;</span>
            </button>
        @endif
    </div>

    @if($hasChildren)
        <ul class="module-children" id="{{ $nodeId }}" hidden>
            @foreach($children as $child)
                @include('web.pages.plan-module', [
                    'module' => $child,
                    'allowedModuleIds' => $allowedModuleIds
                ])
            @endforeach
        </ul>
    @endif
</li>