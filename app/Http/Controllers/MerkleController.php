<?php

namespace App\Http\Controllers;

use App\Models\leafNode;
use Illuminate\Http\Request;

class MerkleController extends Controller
{
    public function generateMerkleTree(Request $request)
    {
        $leafNodes = leafNode::all();

        $leafNodeHashes = $leafNodes->pluck('hash')->toArray();

        $merkleRoot = $this->calculateMerkleRoot($leafNodeHashes);

        return response()->json(['merkleRoot' => $merkleRoot]);
    }

    protected function calculateMerkleRoot(array $leafNodeHashes)
    {
        while (count($leafNodeHashes) > 1) {
            $levelHashes = [];

            for ($i = 0; $i < count($leafNodeHashes) - 1; $i += 2) {
                $levelHashes[] = hash('sha256', $leafNodeHashes[$i] . $leafNodeHashes[$i + 1]);
            }

            if (count($leafNodeHashes) % 2 !== 0) {
                $levelHashes[] = $leafNodeHashes[count($leafNodeHashes) - 1];
            }

            $leafNodeHashes = $levelHashes;
        }

        return $leafNodeHashes[0];
    }
}
