<?php

namespace App\Filament\Organisation\Resources\MembershipPlans\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Placeholder;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;

class MembershipPlanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Basic Information')
                    ->description('Set the name, tier, and pricing for this membership plan.')
                    ->icon('heroicon-o-identification')
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('e.g. Gold Membership'),
                        TextInput::make('tier')
                            ->placeholder('e.g. Gold, Silver, Platinum')
                            ->maxLength(100),
                        TextInput::make('price')
                            ->numeric()
                            ->prefix('$')
                            ->required()
                            ->minValue(0)
                            ->step(0.01),
                    ])->columns(3),

                Section::make('Benefits')
                    ->description('Describe the benefits included in this membership plan. Use bullet points for clarity.')
                    ->icon('heroicon-o-gift')
                    ->schema([
                        RichEditor::make('benefits_text')
                            ->label('Membership Benefits')
                            ->placeholder('List all benefits included in this plan...')
                            ->toolbarButtons([
                                'bold',
                                'italic',
                                'underline',
                                'bulletList',
                                'orderedList',
                                'h2',
                                'h3',
                                'link',
                            ])
                            ->columnSpanFull(),
                    ]),

                Section::make('Branding & Card Design')
                    ->description('Upload a logo and set brand colors for the membership card.')
                    ->icon('heroicon-o-paint-brush')
                    ->schema([
                        FileUpload::make('branding_logo')
                            ->label('Membership Card Logo')
                            ->image()
                            ->disk('public')
                            ->directory('membership-logos')
                            ->visibility('public')
                            ->imagePreviewHeight('100')
                            ->maxSize(2048)
                            ->preserveFilenames()
                            ->helperText('Upload a logo (PNG, JPG, or SVG, max 2MB).'),

                        Grid::make(3)
                            ->schema([
                                ColorPicker::make('branding_colors.primary')
                                    ->label('Primary Color')
                                    ->default('#000000'),
                                ColorPicker::make('branding_colors.secondary')
                                    ->label('Secondary Color')
                                    ->default('#ffffff'),
                                ColorPicker::make('branding_colors.accent')
                                    ->label('Accent Color')
                                    ->default('#FFD700'),
                            ]),
                    ])->columns(2),
            ]);
    }
}
