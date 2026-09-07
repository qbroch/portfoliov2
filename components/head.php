<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $title ?? "Portfolio" ?></title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="assets/global.css">
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        background: "#09090B",
                        surface: "#18181B",
                        "surface-hover": "#27272A",
                        border: "#27272A",

                        "text-primary": "#FAFAFA",
                        "text-secondary": "#A1A1AA",

                        primary: {
                            DEFAULT: "#6366F1",
                            hover: "#818CF8"
                        }
                    },

                    fontFamily: {
                        primary: ["Inter", "sans-serif"]
                    }
                }
            }
        }
    </script>
</head>
