<?php

namespace App\Filament\Organisation\Resources\MembershipPlans;

use App\Filament\Organisation\Resources\MembershipPlans\Pages\CreateMembershipPlan;
use App\Filament\Organisation\Resources\MembershipPlans\Pages\EditMembershipPlan;
use App\Filament\Organisation\Resources\MembershipPlans\Pages\ListMembershipPlans;
use App\Filament\Organisation\Resources\MembershipPlans\Schemas\MembershipPlanForm;
use App\Filament\Organisation\Resources\MembershipPlans\Tables\MembershipPlansTable;
use App\Models\MembershipPlan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MembershipPlanResource extends Resource
{
    protected static ?string $model = MembershipPlan::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return MembershipPlanForm::configure($schema);
    }

    public static function getEloquentQuery(): \Illuminate\Database\Eloquent\Builder
    {
        return parent::getEloquentQuery()
            ->where('organisation_id', auth()->user()->organisation_id);
    }

    public static function table(Table $table): Table
    {
        return MembershipPlansTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListMembershipPlans::route('/'),
            'create' => CreateMembershipPlan::route('/create'),
            'edit' => EditMembershipPlan::route('/{record}/edit'),
        ];
    }
}
