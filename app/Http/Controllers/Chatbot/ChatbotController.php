<?php

namespace App\Http\Controllers\Chatbot;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\GeminiService;

class ChatbotController extends Controller
{
    public function index()
    {
        return view('Chatbot.index');
    }

    public function chat(Request $request, GeminiService $gemini)
    {
        $request->validate([
            'prompt' => 'required|string'
        ]);

        $result = $gemini->generateContent($request->prompt);

        $answer = $result['candidates'][0]['content']['parts'][0]['text'] ?? 'No response';

        // return response()->json($result);
        return view('Chatbot.index', compact('answer'));
    }

}
