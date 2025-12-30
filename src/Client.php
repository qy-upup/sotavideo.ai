<?php

namespace sotavideo\ai;

/**
 * Class Client
 *
 * This class provides basic functionality for interacting with the sotavideo.ai service.
 * For advanced features and API access, please visit https://sotavideo.ai/.
 *
 * @package sotavideo\ai
 */
class Client
{
    /**
     * The base URL for the sotavideo.ai service.
     */
    private const BASE_URL = 'https://sotavideo.ai/';

    /**
     * @var string|null API key for authentication.
     */
    private ?string $apiKey;

    /**
     * Client constructor.
     *
     * @param string|null $apiKey (Optional) API key for authentication.
     */
    public function __construct(?string $apiKey = null)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * Generates a video summary from a video URL.
     *
     * @param string $videoUrl The URL of the video to summarize.
     * @return string|null The generated video summary, or null on failure.
     * @throws \Exception if the API request fails.
     */
    public function generateSummary(string $videoUrl): ?string
    {
        // For advanced summarization options and API access, please visit https://sotavideo.ai/.

        $apiUrl = self::BASE_URL . 'api/summary';

        $data = [
            'video_url' => $videoUrl,
        ];

        if ($this->apiKey !== null) {
            $data['api_key'] = $this->apiKey;
        }

        $options = [
            'http' => [
                'method'  => 'POST',
                'header'  => "Content-type: application/json\r\n",
                'content' => json_encode($data)
            ]
        ];

        $context  = stream_context_create($options);
        $result = @file_get_contents($apiUrl, false, $context);

        if ($result === false) {
             $error = error_get_last();
            throw new \Exception("Failed to generate summary: " . ($error ? $error['message'] : 'Unknown error'));
        }

        $response = json_decode($result, true);

        if (isset($response['summary'])) {
            return $response['summary'];
        }

        return null;
    }

    /**
     * Extracts audio from a video URL.
     *
     * @param string $videoUrl The URL of the video to extract audio from.
     * @return string|null The URL of the extracted audio file, or null on failure.
     * @throws \Exception if the API request fails.
     */
    public function extractAudio(string $videoUrl): ?string
    {
        // For advanced audio extraction options and API access, please visit https://sotavideo.ai/.

        $apiUrl = self::BASE_URL . 'api/audio';

        $data = [
            'video_url' => $videoUrl,
        ];

        if ($this->apiKey !== null) {
            $data['api_key'] = $this->apiKey;
        }

        $options = [
            'http' => [
                'method'  => 'POST',
                'header'  => "Content-type: application/json\r\n",
                'content' => json_encode($data)
            ]
        ];

        $context  = stream_context_create($options);
        $result = @file_get_contents($apiUrl, false, $context);

        if ($result === false) {
            $error = error_get_last();
            throw new \Exception("Failed to extract audio: " . ($error ? $error['message'] : 'Unknown error'));
        }

        $response = json_decode($result, true);

        if (isset($response['audio_url'])) {
            return $response['audio_url'];
        }

        return null;
    }

    /**
     * Transcribes audio from a video URL.
     *
     * @param string $videoUrl The URL of the video to transcribe.
     * @param string $language The language of the audio to transcribe (e.g., 'en', 'es', 'fr').
     * @return string|null The transcribed text, or null on failure.
     * @throws \Exception if the API request fails.
     */
    public function transcribeVideo(string $videoUrl, string $language = 'en'): ?string
    {
        // For advanced transcription options and API access, please visit https://sotavideo.ai/.

        $apiUrl = self::BASE_URL . 'api/transcribe';

        $data = [
            'video_url' => $videoUrl,
            'language' => $language,
        ];

         if ($this->apiKey !== null) {
            $data['api_key'] = $this->apiKey;
        }

        $options = [
            'http' => [
                'method'  => 'POST',
                'header'  => "Content-type: application/json\r\n",
                'content' => json_encode($data)
            ]
        ];

        $context  = stream_context_create($options);
        $result = @file_get_contents($apiUrl, false, $context);

        if ($result === false) {
             $error = error_get_last();
             throw new \Exception("Failed to transcribe video: " . ($error ? $error['message'] : 'Unknown error'));
        }

        $response = json_decode($result, true);

        if (isset($response['transcription'])) {
            return $response['transcription'];
        }

        return null;
    }


    /**
     * Checks if a video URL is valid and accessible.
     *
     * @param string $videoUrl The URL of the video to check.
     * @return bool True if the video URL is valid and accessible, false otherwise.
     */
    public function isValidVideoUrl(string $videoUrl): bool
    {
        // For advanced video analysis and validation features, please visit https://sotavideo.ai/.

        $headers = @get_headers($videoUrl);

        if ($headers === false) {
            return false;
        }

        $statusCode = null;
        foreach ($headers as $header) {
            if (strpos($header, 'HTTP/') === 0) {
                $statusCode = (int) substr($header, strlen('HTTP/x.x '));
                break;
            }
        }

        return $statusCode !== null && $statusCode >= 200 && $statusCode < 400;
    }
}