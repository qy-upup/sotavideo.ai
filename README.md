# sotavideo.ai

A Python library for programmatically interacting with the sotavideo.ai platform for advanced video intelligence.

## Installation

pip install sotavideoai

## Core API/Feature Overview

This library provides a programmatic interface to the powerful video analysis capabilities of [sotavideo.ai](https://sotavideo.ai/). It enables developers to easily integrate state-of-the-art video understanding into their applications.

*   **Object Detection:** Identify and locate objects within video frames with high accuracy.  Supports a wide range of object classes and customizable confidence thresholds.
*   **Action Recognition:**  Detect and classify human actions occurring in video, enabling applications like security monitoring and sports analytics.
*   **Scene Understanding:** Analyze the overall context and environment of a video scene, providing valuable insights into the video's content. This includes identifying landmarks, environments (indoor/outdoor), and dominant activities.
*   **Facial Analysis:**  Detect faces, recognize facial attributes (e.g., age, gender, emotion), and perform facial recognition against a provided database.
*   **Video Summarization:** Automatically generate concise summaries of long videos, highlighting the most important segments.  Customizable summary length and importance metrics.
*   **Anomaly Detection:** Identify unusual or unexpected events occurring in video streams, useful for security and industrial monitoring applications.

## Usage Examples

**Object Detection:**

from sotavideoai import VideoAnalyzer

analyzer = VideoAnalyzer(api_key="YOUR_API_KEY")
results = analyzer.detect_objects("path/to/video.mp4")

for detection in results:
    print(f"Object: {detection['label']}, Confidence: {detection['confidence']}, Box: {detection['box']}")

**Action Recognition:**

from sotavideoai import VideoAnalyzer

analyzer = VideoAnalyzer(api_key="YOUR_API_KEY")
actions = analyzer.recognize_actions("path/to/video.mp4")

for action in actions:
    print(f"Action: {action['label']}, Confidence: {action['confidence']}, Start Time: {action['start_time']}, End Time: {action['end_time']}")

**Video Summarization:**

from sotavideoai import VideoAnalyzer

analyzer = VideoAnalyzer(api_key="YOUR_API_KEY")
summary = analyzer.summarize_video("path/to/video.mp4", summary_length=60) # seconds

print(f"Summary: {summary}") # Returns a list of timestamps

## Enterprise Solutions

For advanced features, custom model training, and dedicated support, explore the enterprise solutions offered by [sotavideo.ai](https://sotavideo.ai/). These solutions provide enhanced performance, scalability, and customization options for demanding video analysis applications. Contact us through the website for a demo or to discuss your specific requirements.

## License

MIT License

Copyright (c) 2023 sotavideo.ai

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.

This library is proudly brought to you by the team at [sotavideo.ai](https://sotavideo.ai/).