<!DOCTYPE html>
<html lang="en" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
    <meta charset="utf-8">
    <meta name="x-apple-disable-message-reformatting">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no, date=no, address=no, email=no">
    <!--[if mso]>
    <xml><o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch></o:OfficeDocumentSettings></xml>
    <style>
      td,th,div,p,a,h1,h2,h3,h4,h5,h6 {font-family: "Segoe UI", sans-serif; mso-line-height-rule: exactly;}
    </style>
  <![endif]-->
    <link
        href="https://fonts.googleapis.com/css?family=Ubuntu:ital,wght@0,200;0,300;0,600;0,700;0,900;1,100;1,200;1,500;1,600;1,900&amp;display=swap"
        rel="stylesheet" media="screen">
    <style>
        @media (prefers-color-scheme: dark) {

            body,
            .email-body_inner,
            .email-wrapper {
                background-color: #333333 !important;
                color: #ffffff !important;
            }

            p,
            ul,
            ol,
            blockquote,
            h1,
            h2,
            h3 {
                color: #ffffff !important;
            }
        }

        .hover-bg-blue-700:hover {
            background-color: #1d4ed8 !important;
        }

        @media (max-width: 600px) {
            .sm-w-full {
                width: 100% !important;
            }
        }
    </style>
</head>

<body
    style="margin: 0; width: 100%; padding: 0; word-break: break-word; -webkit-font-smoothing: antialiased; background-color: #dbeafe;">
    <div role="article" aria-roledescription="email" aria-label="" lang="en">
        <div class="email-wrapper" style="height: 100%; width: 100%; background-color: #dbeafe;">
            <div class="email-body_inner sm-w-full"
                style="margin-left: auto; margin-right: auto; width: 570px; background-color: #ffffff; text-align: center; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);">
                <div style="margin-bottom: 16px; background-color: #2563eb; padding: 16px; text-align: left;">
                    <h1 style="font-size: 24px; font-weight: 800; color: #ffffff;">Hi, {{ $name }}</h1>
                    <p style="font-size: 18px; color: #ffffff;">I'm delighted of your testimonial 😍, it'll be published
                        as soon as possible.
                        Thank you!</p>
                </div>
                <div style="margin-bottom: 16px; padding: 16px; text-align: center;">
                    <img src="{{ $avatar }}" width="140px" height="140px" alt="{{ $name }}"
                        style="border: 0; max-width: 100%; vertical-align: middle; line-height: 100%; margin-bottom: 16px; border-radius: 9999px;">
                    <div style="margin-top: 2px; margin-bottom: 2px; font-weight: 700; color: #1f2937;">
                        {{ $name }}
                        <span> {{ $position }}</span>
                    </div>
                    <p>
                        {{ $body }}
                    </p>
                </div>
                <hr style="height: 1px; border-width: 0px; background-color: #d1d5db; color: #d1d5db;">
                <div style="margin-bottom: 16px; padding: 16px; text-align: center;">
                    <p style="font-size: 20px; font-weight: 600; color: #2563eb;">I would be glad to have your
                        recommendation on my LinkedIn
                        account as well.
                    </p>
                    <a href="https://www.linkedin.com/in/mozedan/detail/recommendation/write/" class="hover-bg-blue-700"
                        style="display: inline-block; border-radius: 4px; background-color: #2563eb; padding-left: 24px; padding-right: 24px; padding-top: 16px; padding-bottom: 16px; font-size: 14px; font-weight: 600; line-height: 1; color: #ffffff; text-decoration: none;">
                        <!--[if mso]><i style="letter-spacing: 27px; mso-font-width: -100%; mso-text-raise: 26pt;">&nbsp;</i><![endif]-->
                        <span style="mso-text-raise: 13pt;">Share On LinkedIn</span>
                        <!--[if mso]><i style="letter-spacing: 27px; mso-font-width: -100%;">&nbsp;</i><![endif]-->
                    </a>
                </div>
                <div style="background-color: #2563eb; padding: 16px; text-align: center;">
                    <a href="mailto:mo@zedan.me"
                        style="font-size: 16px; font-weight: 700; color: #ffffff;">mo@zedan.me</a>
                    <p style="font-size: 16px; font-weight: 700; color: #ffffff;">Mohamed Zedan -
                        <a href="https://zedan.me"
                            style="font-size: 16px; font-weight: 700; color: #ffffff;">Zedan.me</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
