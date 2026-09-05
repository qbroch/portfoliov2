# Palette du portfolio — A : Dark + Indigo

Référence des couleurs pour la maquette Figma et l’intégration Tailwind CSS.

## Palette générale

- **Background** — fond de page : `#09090B` → `bg-zinc-950`
- **Surface / Cards** — surfaces et cartes : `#18181B` → `bg-zinc-900`
- **Surface Hover** — surface au survol : `#27272A` → `hover:bg-zinc-800`
- **Borders** — bordures : `#27272A` → `border-zinc-800`
- **Text Primary** — texte principal : `#FAFAFA` → `text-zinc-50`
- **Text Secondary** — texte secondaire : `#A1A1AA` → `text-zinc-400`
- **Primary / Accent** — actions principales et accents : `#6366F1` → `bg-indigo-500` ou `text-indigo-500`
- **Primary Hover** — accent au survol : `#818CF8` → `hover:bg-indigo-400`

Les noms Tailwind ci-dessus correspondent aux teintes de référence Tailwind v3. Pour conserver exactement les codes hex dans toute version ou configuration, utiliser des valeurs arbitraires, par exemple `bg-[#09090B]`.

## Boutons

### Primary — action principale

Exemples : « Voir mes projets », « Me contacter ».

- Fond : `#6366F1`
- Texte : `#FFFFFF`
- Fond au survol : `#818CF8`

```html
class="bg-[#6366F1] text-[#FFFFFF] hover:bg-[#818CF8]"
```

### Secondary — action secondaire

Exemples : « GitHub », « Voir le code ».

- Fond : transparent
- Bordure : `#3F3F46`
- Texte : `#FAFAFA`
- Fond au survol : `#18181B`
- Bordure au survol : `#52525B`

```html
class="bg-transparent border border-[#3F3F46] text-[#FAFAFA] hover:bg-[#18181B] hover:border-[#52525B]"
```

### Ghost — action discrète

Exemple : « Voir le projet » sur une carte.

- Fond : transparent
- Bordure : aucune
- Texte : `#A1A1AA`
- Texte au survol : `#FAFAFA`
- Fond au survol : `#18181B`

```html
class="bg-transparent border-0 text-[#A1A1AA] hover:text-[#FAFAFA] hover:bg-[#18181B]"
```

## Organisation dans Figma

Créer une collection `Colors` avec les variables suivantes :

```text
background       #09090B
surface          #18181B
surface-hover    #27272A
border           #27272A
text-primary     #FAFAFA
text-secondary   #A1A1AA
primary          #6366F1
primary-hover    #818CF8
on-primary       #FFFFFF
border-secondary #3F3F46
border-hover     #52525B
```

Utiliser ces variables dans un composant `Button`, avec les variantes `Type = Primary / Secondary / Ghost` et `State = Default / Hover`.
